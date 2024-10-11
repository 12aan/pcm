<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function index()
    {

        $this->load->view('templates/navbar');
        $this->load->view('artikel');
        $this->load->view('templates/footer');
    }

    // surat masuk admin

    public function artikel()
    {

        $data['title'] = 'Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile/artikel', $data);
        $this->load->view('templates/footer');
    }
}
