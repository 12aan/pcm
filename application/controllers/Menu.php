<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }



    public function menu_website()
    {
        $data['title'] = 'Menu Website';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // Get all menus
        $data['menu'] = $this->db->get('menu')->result_array();
        // Get all submenus
        $data['submenu'] = $this->db->get('submenu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu_website/menu_website', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_menu()
    {
        if ($this->input->post()) {
            $data = array(
                'judul' => $this->input->post('judul_menu'),
                'url' => $this->input->post('url_menu'),
                'aktif' => $this->input->post('aktif_menu')
            );

            $this->db->insert('menu', $data); // Insert into menu table
            $id_menu = $this->db->insert_id(); // Get the ID of the inserted menu

            // Check if submenus were added
            $submenus = $this->input->post('submenujudul');
            if (!empty($submenus)) {
                foreach ($submenus as $index => $judul) {
                    if (!empty($judul)) {
                        $submenu_data = array(
                            'judul' => $judul,
                            'url' => $this->input->post('submenuurl')[$index],
                            'idmenu' => $id_menu,
                            'aktif' => $this->input->post('submenuaktif')[$index]
                        );
                        $this->db->insert('submenu', $submenu_data);
                    }
                }
            }



            redirect('menu/menu_website/menu_website');
        }

        $data['title'] = 'Tambah Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu_website/tambah_data_menu', $data);
        $this->load->view('templates/footer');
    }

    // Add a new submenu
    public function tambah_data_submenu()
    {
        if ($this->input->post()) {
            $data = array(
                'judul' => $this->input->post('judul_submenu'),
                'url' => $this->input->post('url_submenu'),
                'idmenu' => $this->input->post('idmenu'),
                'aktif' => $this->input->post('aktif_submenu')
            );

            $this->db->insert('submenu', $data); // Insert into submenu table
            redirect('menu/menu_website/menu_website');
        }


        $data['title'] = 'Tambah Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('menu')->result_array(); // Get all menus for dropdown

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu_website/tambah_data_submenu', $data);
        $this->load->view('templates/footer');
    }

    // Edit menu
    public function edit_data_menu($id_menu)
    {
        $data['menu'] = $this->db->get_where('menu', array('idmenu' => $id_menu))->row_array();

        if ($this->input->post()) {
            $update_data = array(
                'judul' => $this->input->post('judul_menu'),
                'url' => $this->input->post('url_menu'),
                'aktif' => $this->input->post('aktif_menu')
            );

            $this->db->where('idmenu', $id_menu);
            $this->db->update('menu', $update_data);
            redirect('menu/menu_website/menu_website');
        }


        $data['title'] = 'Tambah Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu_website/edit_data_menu', $data);
        $this->load->view('templates/footer');
    }

    // Edit submenu
    public function edit_data_submenu($id_submenu)
    {
        $data['submenu'] = $this->db->get_where('submenu', array('idsubmenu' => $id_submenu))->row_array();
        $data['menu'] = $this->db->get('menu')->result_array(); // Get all menus for dropdown

        if ($this->input->post()) {
            $update_data = array(
                'judul' => $this->input->post('judul_submenu'),
                'url' => $this->input->post('url_submenu'),
                'idmenu' => $this->input->post('idmenu'),
                'aktif' => $this->input->post('aktif_submenu')
            );

            $this->db->where('idsubmenu', $id_submenu);
            $this->db->update('submenu', $update_data);
            redirect('menu/menu_website/menu_website');
        }

        $data['title'] = 'Tambah Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu_website/edit_data_submenu', $data);
        $this->load->view('templates/footer');
    }

    // Delete menu
    public function hapus_data_menu($id_menu)
    {
        $this->db->delete('menu', array('idmenu' => $id_menu));
        $this->db->delete('submenu', array('idmenu' => $id_menu)); // Delete related submenus
        redirect('menu/menu_website/menu_website');
    }

    // Delete submenu
    public function hapus_data_submenu($id_submenu)
    {
        $this->db->delete('submenu', array('idsubmenu' => $id_submenu));
        redirect('menu/menu_website/menu_website');
    }
}
