<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Slider_Model');
	}

	public function index()
	{
		// Load data surat_masuk from the backend
		$data['slider'] = $this->Slider_Model->get_slider(); // Gantilah dengan fungsi sesuai kebutuhan
		foreach ($data['slider'] as $slider) {
			// Misalnya, URL avatar foto slider disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $slider['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$this->load->view('templates/navbar');
		$this->load->view('slider', $data);
		$this->load->view('templates/footer');
	}
	// surat masuk admin
	public function slider()
	{
		$data['title'] = 'Slider';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['slider'] = $this->Slider_Model->get_slider();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/slider', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data_slider()
	{

		$data['title'] = 'Tambah Slider';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['slider'] = $this->Slider_Model->get_slider();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/tambah_data_slider', $data);
		$this->load->view('templates/footer');
	}

	public function edit_data_slider()
	{

		$data['title'] = 'Edit Slider';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['slider'] = $this->Slider_Model->get_slider();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/edit_data_slider', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_data_slider($id_slider)
	{
		// Pastikan ID tidak kosong dan merupakan angka
		if (!empty($id_slider) && is_numeric($id_slider)) {
			// Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
			$this->load->model('Slider_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

			// Panggil fungsi dalam model untuk menghapus data berdasarkan ID
			$result = $this->Slider_Model->hapus_data_slider($id_slider);

			if ($result) {
				// Redirect atau tampilkan pesan sukses jika data berhasil dihapus
				redirect('slider/slider'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
