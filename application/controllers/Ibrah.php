<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibrah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Ibrah_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['ibrah'] = $this->Ibrah_Model->get_ibrah(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['latepost_photos'] = array();
		foreach ($data['ibrah'] as $ibrah) {
			// Misalnya, URL avatar foto ibrah disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $ibrah['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('ibrah', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function ibrah()
	{

		$data['title'] = 'Ibrah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ibrah'] = $this->Ibrah_Model->get_ibrah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/ibrah', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_ibrah()
	{

		$data['title'] = 'Tambah Ibrah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ibrah'] = $this->Ibrah_Model->get_ibrah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/tambah_data_ibrah', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_ibrah()
	{

		$data['title'] = 'Edit Ibrah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ibrah'] = $this->Ibrah_Model->get_ibrah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/edit_data_ibrah', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data_ibrah($id_ibrah)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_ibrah) && is_numeric($id_ibrah)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('Ibrah_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->Ibrah_Model->hapus_data_ibrah($id_ibrah);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('ibrah/ibrah'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
			} else {
				// Tampilkan pesan error jika data tidak dapat dihapus
				echo "Gagal menghapus data.";
			}
		} else {
			// Tampilkan pesan error jika parameter ID tidak valid
			echo "ID tidak valid.";
		}
	}
}
