<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{


    public function sd_mst()
    {
        $this->load->view('templates/navbar');
        $this->load->view('sekolah/sd_mst');
        $this->load->view('templates/footer');
    }
    public function sd_mmt()
    {
        $this->load->view('templates/navbar');
        $this->load->view('sekolah/sd_mmt');
        $this->load->view('templates/footer');
    }
    public function sd_msb()
    {
        $this->load->view('templates/navbar');
        $this->load->view('sekolah/sd_msb');
        $this->load->view('templates/footer');
    }
    public function sd_mt()
    {
        $this->load->view('templates/navbar');
        $this->load->view('sekolah/sd_mt');
        $this->load->view('templates/footer');
    }
    public function sd_mkt()
    {
        $this->load->view('templates/navbar');
        $this->load->view('sekolah/sd_mkt');
        $this->load->view('templates/footer');
    }
}
