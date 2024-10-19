<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perguruan extends CI_Controller
{

    public function perguruan_paud()
    {
        $this->load->view('templates/user_navbar');
        $this->load->view('perguruan_paud');
        $this->load->view('templates/user_footer');
    }
    public function perguruan_dasar()
    {

        $this->load->view('templates/user_navbar');
        $this->load->view('perguruan_dasar');
        $this->load->view('templates/user_footer');
    }
    public function perguruan_atas()
    {

        $this->load->view('templates/user_navbar');
        $this->load->view('perguruan_atas');
        $this->load->view('templates/user_footer');
    }
    // surat masuk admin

}
