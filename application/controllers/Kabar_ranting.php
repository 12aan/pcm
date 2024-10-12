<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabar_ranting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('KabarRanting_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['kabar_ranting'] as $kabar_ranting) {
			// Misalnya, URL avatar foto kabar_ranting disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $kabar_ranting['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('kabar_ranting', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function kabar_ranting()
	{
		$data['title'] = 'Kabar Ranting';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/kabar_ranting/kabar_ranting', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_kabar_ranting()
	{

		$data['title'] = 'Tambah Kabar Ranting';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/kabar_ranting/tambah_data_kabar_ranting', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_kabar_ranting()
	{

		$data['title'] = 'Edit Kabar Ranting';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/kabar_ranting/edit_data_kabar_ranting', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data_kabar_ranting($id_kabar_ranting)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_kabar_ranting) && is_numeric($id_kabar_ranting)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('KabarRanting_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->KabarRanting_Model->hapus_data_kabar_ranting($id_kabar_ranting);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('kabar_ranting/kabar_ranting'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
