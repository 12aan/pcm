<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pustaka extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pustaka_Model');
    }

    public function index()
    {
        // Load data surat_masuk from the backend
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('pustaka', $data);
        $this->load->view('templates/footer');
    }

    // surat masuk admin
    public function pustaka()
    {

        $data['title'] = 'Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pustaka/pustaka', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pustaka()
    {

        $data['title'] = 'Tambah Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pustaka/tambah_pustaka', $data);
        $this->load->view('templates/footer');
    }

    public function edit_pustaka()
    {

        $data['title'] = 'Edit Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pustaka/edit_pustaka', $data);
        $this->load->view('templates/footer');
    }
}
