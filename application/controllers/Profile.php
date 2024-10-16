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


	public function kajian_hadist()
	{
		$data['title'] = 'Kajian Hadist';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Ambil data kajian yang sudah ada di database
		$data['kajian_hadist'] = $this->Profile_Model->get_kajian_hadist();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/kajian_hadist', $data);
		$this->load->view('templates/footer');
	}

	public function upload_kajian()
	{
		$judul_kajian = $this->input->post('judul_kajian');
		$isi_kajian = $this->input->post('isi_kajian');

		$data = [
			'judul_kajian' => $judul_kajian,
			'isi_kajian' => $isi_kajian,
			'date_created' => date('Y-m-d H:i:s')
		];

		// Simpan data ke database
		$this->db->insert('Kajian_hadist', $data);

		// Dapatkan data kajian yang baru saja diunggah
		$id_kajian = $this->db->insert_id();
		$data['kajian'] = $this->Profile_Model->get_kajian_by_id($id_kajian);

		// Kirim data kajian ke view dengan flashdata
		$this->session->set_flashdata('kajian', $data['kajian']);

		// Redirect ke halaman kajian hadist
		redirect('profile/kajian_hadist');
	}

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
