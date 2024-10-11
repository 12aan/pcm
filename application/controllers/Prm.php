<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prm extends CI_Controller
{


    public function prm_tirto_utara()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tirto_utara');
        $this->load->view('templates/footer');
    }

    public function prm_tirto_barat()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tirto_barat');
        $this->load->view('templates/footer');
    }
    public function prm_tirto_tengah()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tirto_tengah');
        $this->load->view('templates/footer');
    }
    public function prm_tirto_timur()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tirto_timur');
        $this->load->view('templates/footer');
    }
    public function prm_tirto_selatan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tirto_selatan');
        $this->load->view('templates/footer');
    }
    public function prm_ngesti_utara()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_ngesti_utara');
        $this->load->view('templates/footer');
    }
    public function prm_ngesti_tengah()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_ngesti_tengah');
        $this->load->view('templates/footer');
    }
    public function prm_ngesti_selatan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_ngesti_selatan');
        $this->load->view('templates/footer');
    }
    public function prm_bangunjiwo_barat()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_bangunjiwo_barat');
        $this->load->view('templates/footer');
    }
    public function prm_bangunjiwo_timur()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_bangunjiwo_timur');
        $this->load->view('templates/footer');
    }
    public function prm_tamantirto_utara()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tamantirto_utara');
        $this->load->view('templates/footer');
    }
    public function prm_tamantirto_selatan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('prm/prm_tamantirto_selatan');
        $this->load->view('templates/footer');
    }
}
