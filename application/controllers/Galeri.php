<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Galeri_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['galeri'] = $this->Galeri_Model->get_galeri(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['galeri'] as $galeri) {
			// Misalnya, URL avatar foto galeri disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $galeri['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('galeri', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function galeri()
	{
		$data['title'] = 'Galeri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['galeri'] = $this->Galeri_Model->get_galeri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/galeri/galeri', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_galeri()
	{

		$data['title'] = 'Tambah Galeri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['galeri'] = $this->Galeri_Model->get_galeri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/galeri/tambah_data_galeri', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_galeri()
	{

		$data['title'] = 'Edit Galeri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['galeri'] = $this->Galeri_Model->get_galeri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/galeri/edit_data_galeri', $data);
		$this->load->view('templates/footer');
	}



	public function hapus_data_berita($id_galeri)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_galeri) && is_numeric($id_galeri)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('Galeri_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->Galeri_Model->hapus_data_berita($id_galeri);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('galeri/galeri'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
