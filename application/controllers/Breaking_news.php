<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Breaking_news extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('BreakingNews_model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['breaking_news'] as $breaking_news) {
			// Misalnya, URL avatar foto breaking_news disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $breaking_news['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('breaking_news', $data);
		$this->load->view('templates/footer');
	}

	// surat masuk admin
	public function breaking_news()
	{
		$data['title'] = 'Breaking News';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/breaking_news/breaking_news', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_breaking_news()
	{
		$data['title'] = 'Tambah Breaking News';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/breaking_news/tambah_data_breaking_news', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_breaking_news()
	{
		$data['title'] = 'Edit Breaking News';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/breaking_news/edit_data_breaking_news', $data);
		$this->load->view('templates/footer');
	}



	public function hapus_data_breaking_news($id_news)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_news) && is_numeric($id_news)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('BreakingNews_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->BreakingNews_model->hapus_data_breaking_news($id_news);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('breaking_news/breaking_news'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
