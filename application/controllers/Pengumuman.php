<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Pengumuman_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['pengumuman'] as $pengumuman) {
			// Misalnya, URL avatar foto pengumuman disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $pengumuman['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('pengumuman', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function pengumuman()
	{
		$data['title'] = 'Pengumuman';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/pengumuman/pengumuman', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_pengumuman()
	{

		$data['title'] = 'Tambah Pengumuman';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/pengumuman/tambah_data_pengumuman', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_pengumuman()
	{

		$data['title'] = 'Edit Pengumuman';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/pengumuman/edit_data_pengumuman', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data_pengumuman($id_pengumuman)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_pengumuman) && is_numeric($id_pengumuman)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('Pengumuman_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->Pengumuman_Model->hapus_data_pengumuman($id_pengumuman);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('pengumuman/pengumuman'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
