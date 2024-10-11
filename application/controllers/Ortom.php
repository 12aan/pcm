<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ortom extends CI_Controller
{


    public function pimpinan_cabang_aisyah()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/pimpinan_cabang_aisyah');
        $this->load->view('templates/footer');
    }
    public function pim_cab_pemuda_muhammadiyah()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/pim_cab_pemuda_muhammadiyah');
        $this->load->view('templates/footer');
    }
    public function pim_cab_nasyiah()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/pim_cab_nasyiah');
        $this->load->view('templates/footer');
    }
    public function pim_cab_ipm()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/pim_cab_ipm');
        $this->load->view('templates/footer');
    }
    public function kokam_kec_kasihan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/kokam_kec_kasihan');
        $this->load->view('templates/footer');
    }
    public function hw_kec_kasihan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/hw_kec_kasihan');
        $this->load->view('templates/footer');
    }
    public function ts_kec_kasihan()
    {
        $this->load->view('templates/navbar');
        $this->load->view('ortom/ts_kec_kasihan');
        $this->load->view('templates/footer');
    }
}
