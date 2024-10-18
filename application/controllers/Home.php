<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_Model');
		$this->load->model('Berita_Model');
		$this->load->model('BreakingNews_model');
		$this->load->model('Pengumuman_Model');
		$this->load->model('Galeri_Model');
		$this->load->model('Suaramuhammadiyah_Model');
		$this->load->model('KabarRanting_Model');
		$this->load->model('Slider_Model');
		$this->load->model('VisitModel'); // Load model visit

	}

	public function index()
	{
		$data['berita'] = $this->Berita_Model->get_berita();
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['galeri'] = $this->Galeri_Model->get_galeri(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting(); // Gantilah dengan fungsi sesuai kebutuhan

		$this->VisitModel->record_visit();
		$this->load->view('templates/user_navbar');
		$this->load->view('user/home', $data);
		$this->load->view('templates/user_footer');
	}

	public function sliderdetail($id)
	{
		$data['slider'] = $this->Slider_Model->get_slider();

		$data['item'] = $this->Slider_Model->get_slider_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['slider'] as $slider) {
			// Misalnya, URL avatar foto slider disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $slider['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/slider/sliderdetail', $data);
		$this->load->view('templates/user_footer');
	}

	public function galeridetail($id)
	{
		$data['galeri'] = $this->Galeri_Model->get_galeri();

		$data['item'] = $this->Galeri_Model->get_galeri_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['galeri'] as $galeri) {
			// Misalnya, URL avatar foto galeri disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $galeri['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/galeri/galeridetail', $data);
		$this->load->view('templates/user_footer');
	}

	public function beritadetail($id)
	{
		$data['berita'] = $this->Berita_Model->get_berita();

		$data['item'] = $this->Berita_Model->get_berita_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['berita'] as $berita) {
			// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $berita['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/berita/beritadetail', $data);
		$this->load->view('templates/user_footer');
	}

	public function kabarrantingdetail($id)
	{
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

		$data['item'] = $this->KabarRanting_Model->get_kabar_ranting_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['kabar_ranting'] as $kabar_ranting) {
			// Misalnya, URL avatar foto kabarranting disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $kabar_ranting['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/kabar_ranting/kabarrantingdetail', $data);
		$this->load->view('templates/user_footer');
	}


	public function breakingnewsdetail($id)
	{
		// Mengambil data breaking news
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news();

		// Mengambil data breaking news berdasarkan ID
		$data['item'] = $this->BreakingNews_model->get_news_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['breaking_news'] as $breaking_news) {
			// Misalnya, URL avatar foto breaking news disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $breaking_news['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		// Memuat tampilan dengan data
		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/breaking_news/breakingnewsdetail', $data);
		$this->load->view('templates/user_footer');
	}


	public function suara_muhammadiyahdetail($id)
	{
		// Retrieve data related to Suara Muhammadiyah
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah();
		$data['item'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah_by_id($id);
		$data['latepost_photos'] = array();

		foreach ($data['suara_muhammadiyah'] as $suara) {
			// Misalnya, URL avatar foto Suara Muhammadiyah disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $suara['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		// Load the necessary views
		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/suara_muhammadiyah/suaramuhammadiyah_detail', $data); // Ensure this view file exists
		$this->load->view('templates/user_footer');
	}


	public function ibrahdetail($id)
	{
		// Load the Ibrah model
		$this->load->model('Ibrah_Model');

		// Retrieve the details of the specific Ibrah item by its ID
		$data['item'] = $this->Ibrah_Model->get_ibrah_by_id($id);

		// Retrieve additional data if needed (e.g., related photos or similar items)
		$data['ibrah'] = $this->Ibrah_Model->get_ibrah(); // Adjust as needed
		$data['latepost_photos'] = array();

		foreach ($data['ibrah'] as $ibrah) {
			// Example: URL for each photo related to Ibrah
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $ibrah['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		// Load the views with the data
		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/ibrah/ibrahdetail', $data);
		$this->load->view('templates/user_footer');
	}


	// public function breaking_news_detail($id)
	// {
	// 	$data['berita'] = $this->Berita_Model->get_berita();

	// 	$data['item'] = $this->BreakingNews_model->get_news_by_id($id);
	// 	$data['latepost_photos'] = array();
	// 	foreach ($data['berita'] as $berita) {
	// 		// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
	// 		$latepost_photo = array(
	// 			'url' => base_url('./uploads/' . $berita['avatar'])
	// 		);
	// 		$data['latepost_photos'][] = $latepost_photo;
	// 	}

	// 	$this->load->view('templates/user_navbar');
	// 	$this->load->view('user/berita/breaking_news/breaking_news_detail', $data);
	// 	$this->load->view('templates/user_footer');
	// }

	public function pengumumandetail($id)
	{
		$data['berita'] = $this->Berita_Model->get_berita();

		$data['item'] = $this->Pengumuman_Model->get_pengumuman_by_id($id);
		$data['latepost_photos'] = array();
		foreach ($data['berita'] as $berita) {
			// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $berita['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/pengumuman/pengumumandetail', $data);
		$this->load->view('templates/user_footer');
	}


	public function Profile()
	{
		// Load data surat_masuk from the backend
		$data['profile'] = $this->Profile_Model->get_profile(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/user_navbar');
		$this->load->view('user/profile/profile', $data);
		$this->load->view('templates/user_footer');
	}

	public function Berita()
	{
		$data['berita'] = $this->Berita_Model->get_berita();
		$this->load->view('templates/user_navbar');
		$this->load->view('user/berita/berita/berita', $data);
		$this->load->view('templates/user_footer');
	}


	public function Kajian()
	{
		$this->load->view('templates/user_navbar');
		$this->load->view('user/profile/kajian');
		$this->load->view('templates/user_footer');
	}


	public function Amal_Usaha_rumah()
	{
		$this->load->view('templates/user_navbar');
		$this->load->view('amal_usaha/rumah_yatimduafa');
		$this->load->view('templates/user_footer');
	}
	public function Amal_Usaha_masjid()
	{
		$this->load->view('templates/navbar');
		$this->load->view('amal_usaha/masjid_musyawarah');
		$this->load->view('templates/footer');
	}
	public function Amal_Usaha_Mushalla()
	{
		$this->load->view('templates/navbar');
		$this->load->view('amal_usaha/masjid_mushalla');
		$this->load->view('templates/footer');
	}
}
