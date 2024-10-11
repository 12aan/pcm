<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Berita_Model');
    }

    public function index()
    {
        // Load data surat_masuk from the backend
        $data['berita'] = $this->Berita_Model->get_berita(); // Gantilah dengan fungsi sesuai kebutuhan
        // Persiapkan data latepost, menggunakan foto-foto berita yang sama
        $data['latepost_photos'] = array();
        foreach ($data['berita'] as $berita) {
            // Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
            $latepost_photo = array(
                'url' => base_url('./uploads/' . $berita['avatar'])
            );
            $data['latepost_photos'][] = $latepost_photo;
        }
        $this->load->view('templates/navbar');
        $this->load->view('berita', $data);
        $this->load->view('templates/footer');
    }
    // surat masuk admin
    public function berita()
    {

        $data['title'] = 'Berita Masa Kini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Berita_Model->get_berita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/berita', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_berita()
    {

        $data['title'] = 'Tambah Berita Masa Kini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Berita_Model->get_berita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/tambah_data_berita', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_berita()
    {

        $data['title'] = 'edit Berita Masa Kini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Berita_Model->get_berita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/edit_data_berita', $data);
        $this->load->view('templates/footer');
    }
}
