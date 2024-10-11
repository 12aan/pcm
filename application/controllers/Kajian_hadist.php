<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajian_hadist extends CI_Controller
{

    public function index()
    {

        $this->load->view('templates/navbar');
        $this->load->view('kajian_hadist');
        $this->load->view('templates/footer');
    }

    // surat masuk admin

    public function kajian_hadist()
    {

        $data['title'] = 'Kajian Hadist';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile/kajian_hadist', $data);
        $this->load->view('templates/footer');
    }
}
