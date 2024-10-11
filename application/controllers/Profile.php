<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_Model');
	}

	// surat masuk admin

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['profile'] = $this->Profile_Model->get_profile(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/navbar');
		$this->load->view('profile', $data);
		$this->load->view('templates/footer');
	}


	public function profile()
	{

		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['profile'] = $this->Profile_Model->get_profile();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/profile', $data);
		$this->load->view('templates/footer');
	}
}
