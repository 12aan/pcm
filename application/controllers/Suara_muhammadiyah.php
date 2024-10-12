<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara_muhammadiyah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Suaramuhammadiyah_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['suara_muhammadiyah'] as $suara_muhammadiyah) {
			// Misalnya, URL avatar foto suara_muhammadiyah disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $suara_muhammadiyah['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('suara_muhammadiyah', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function suara_muhammadiyah()
	{
		$data['title'] = 'Suara Muhammadiyah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/suara_muhammadiyah/suara_muhammadiyah', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_suara_muhammadiyah()
	{

		$data['title'] = 'Tambah Suara Muhammadiyah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/suara_muhammadiyah/tambah_data_suara_muhammadiyah', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_suara_muhammadiyah()
	{

		$data['title'] = 'Edit Suara muhammadiyah';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/suara_muhammadiyah/edit_data_suara_muhammadiyah', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data_suaramuhammadiyah($id_suara)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_suara) && is_numeric($id_suara)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('Suaramuhammadiyah_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->Suaramuhammadiyah_Model->hapus_data_suaramuhammadiyah($id_suara);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('suara_muhammadiyah/suara_muhammadiyah'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
