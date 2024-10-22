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
		$this->load->model('Galeri_Model');
		$this->load->model('Ibrah_Model');
		$this->load->model('KabarRanting_Model');
		$this->load->model('Pengumuman_Model');
		$this->load->model('Slider_Model');
		$this->load->model('Suaramuhammadiyah_Model');
		$this->load->model('SuratMasuk_model');
		$this->load->model('Pustaka_Model');
		$this->load->model('VisitModel'); // Load model visit

	}

	public function index()
	{
		$data['judul'] = 'home';
		$data['berita'] = $this->Berita_Model->get_berita();
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['galeri'] = $this->Galeri_Model->get_galeri(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting(); // Gantilah dengan fungsi sesuai kebutuhan

		$this->VisitModel->record_visit();
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/home', $data);
		$this->load->view('templates/user_footer');
	}


	//user
	public function berita_user()
	{
		// Load data surat_masuk from the backend
		$data['berita'] = $this->Berita_Model->get_berita(); // Gantilah dengan fungsi sesuai kebutuhan
		// Persiapkan data latepost, menggunakan foto-foto berita yang sama
		$data['latepost_photos'] = array();
		foreach ($data['berita'] as $berita) {
			// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $berita['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Berita';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/berita/berita', $data);
		$this->load->view('templates/user_footer');
	}

	public function beritadetail($id)
	{
		$data['berita'] = $this->Berita_Model->get_berita();

		$data['item'] = $this->Berita_Model->get_berita_by_id($id);
		$data['komen'] = $this->db->where('idberita', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['berita'] as $berita) {
			// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $berita['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Berita Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/berita/beritadetail', $data);
		$this->load->view('templates/user_footer');
	}
	public function post_berita_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idberita' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/beritadetail/' . $id);
	}

	// Tampilan untuk user 
	public function breaking_user()
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
		$data['judul'] = 'Breaking News';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/breaking_news/breaking_news', $data);
		$this->load->view('templates/user_footer');
	}

	public function breakingnewsdetail($id)
	{
		// Mengambil data breaking news
		$data['breaking_news'] = $this->BreakingNews_model->get_breaking_news();

		// Mengambil data breaking news berdasarkan ID
		$data['item'] = $this->BreakingNews_model->get_news_by_id($id);
		$data['komen'] = $this->db->where('idbreakingnews', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['breaking_news'] as $breaking_news) {
			// Misalnya, URL avatar foto breaking news disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $breaking_news['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		// Memuat tampilan dengan data
		$data['judul'] = 'Breaking News Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/breaking_news/breakingnewsdetail', $data);
		$this->load->view('templates/user_footer');
	}
	public function post_breaking_news_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idbreakingnews' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/breakingnewsdetail/' . $id);
	}

	// Tampilan USER GALERI
	public function galeri_user()
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
		$data['judul'] = 'Galeri';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/galeri/galeri', $data);
		$this->load->view('templates/user_footer');
	}

	public function galeridetail($id)
	{
		$data['galeri'] = $this->Galeri_Model->get_galeri();

		$data['item'] = $this->Galeri_Model->get_galeri_by_id($id);
		$data['komen'] = $this->db->where('idgaleri', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['galeri'] as $galeri) {
			// Misalnya, URL avatar foto galeri disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $galeri['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Galeri Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/galeri/galeridetail', $data);
		$this->load->view('templates/user_footer');
	}
	public function post_galeri_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idgaleri' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/galeridetail/' . $id);
	}


	// TAMPILAH USER IBRAH
	public function ibrah_user()
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
		$data['judul'] = 'Ibrah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/ibrah/ibrah', $data);
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
		$data['komen'] = $this->db->where('idibrah', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['ibrah'] as $ibrah) {
			// Example: URL for each photo related to Ibrah
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $ibrah['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}

		// Load the views with the data
		$data['judul'] = 'Ibrah Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/ibrah/ibrahdetail', $data);
		$this->load->view('templates/user_footer');
	}
	public function post_ibrah_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idibrah' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/ibrahdetail/' . $id);
	}

	//kabar rating user
	public function kabarranting_user()
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
		$data['judul'] = 'Kabar Ranting';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/kabar_ranting/kabar_ranting', $data);
		$this->load->view('templates/user_footer');
	}

	public function kabarrantingdetail($id)
	{
		$data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

		$data['item'] = $this->KabarRanting_Model->get_kabar_ranting_by_id($id);
		$data['komen'] = $this->db->where('idkabarranting', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['kabar_ranting'] as $kabar_ranting) {
			// Misalnya, URL avatar foto kabarranting disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $kabar_ranting['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Kabar Ranting Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/kabar_ranting/kabarrantingdetail', $data);
		$this->load->view('templates/user_footer');
	}
	public function post_kabar_ranting_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idkabarranting' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/kabarrantingdetail/' . $id);
	}

	//pengumuman user
	public function pengumuman_user()
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
		$data['judul'] = 'Pengumuman';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/pengumuman/pengumuman', $data);
		$this->load->view('templates/user_footer');
	}

	public function pengumumandetail($id)
	{
		$data['berita'] = $this->Berita_Model->get_berita();

		$data['item'] = $this->Pengumuman_Model->get_pengumuman_by_id($id);
		$data['komen'] = $this->db->where('idpengumuman', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();
		foreach ($data['berita'] as $berita) {
			// Misalnya, URL avatar foto berita disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $berita['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Pengumuman Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/pengumuman/pengumumandetail', $data);
		$this->load->view('templates/user_footer');
	}

	public function post_pengumuman_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idpengumuman' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/pengumumandetail/' . $id);
	}

	//slider user
	public function slider_user()
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
		$data['judul'] = 'Slider';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/slider/slider', $data);
		$this->load->view('templates/user_footer');
	}

	public function sliderdetail($id)
	{
		$data['slider'] = $this->Slider_Model->get_slider();

		$data['item'] = $this->Slider_Model->get_slider_by_id($id);
		$data['komen'] = $this->db->where('idslider', $id)->get('comment')->result_array();

		$data['latepost_photos'] = array();

		foreach ($data['slider'] as $slider) {
			// Misalnya, URL avatar foto slider disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $slider['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Slider Detail';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/slider/sliderdetail', $data);
		$this->load->view('templates/user_footer');
	}


	public function post_slider_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idslider' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/sliderdetail/' . $id);
	}

	//USUARA MUHAMMADIYA USER
	public function suaramuhammadiyah_user()
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
		$data['judul'] = 'Suara MUhammadiyah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/suara_muhammadiyah/suara_muhammadiyah', $data);
		$this->load->view('templates/user_footer');
	}

	public function suara_muhammadiyahdetail($id)
	{
		// Retrieve data related to Suara Muhammadiyah
		$data['suara_muhammadiyah'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah();
		$data['item'] = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah_by_id($id);
		$data['komen'] = $this->db->where('idsuaramuhammadiyah', $id)->get('comment')->result_array();
		$data['latepost_photos'] = array();

		foreach ($data['suara_muhammadiyah'] as $suara) {
			// Misalnya, URL avatar foto Suara Muhammadiyah disimpan dalam indeks 'avatar'
			$latepost_photo = array(
				'url' => base_url('./uploads/' . $suara['avatar'])
			);
			$data['latepost_photos'][] = $latepost_photo;
		}
		$data['judul'] = 'Suara MUhammadiyah Detail';
		// Load the necessary views
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/suara_muhammadiyah/suaramuhammadiyah_detail', $data); // Ensure this view file exists
		$this->load->view('templates/user_footer');
	}
	public function post_suara_muhammadiyah_comment($id)
	{
		$data = array(
			'komentar' => $this->input->post('comment'),
			'idsuaramuhammadiyah' => $id,
			'email'   => $this->input->post('email'),
			'name'    => $this->input->post('name')
		);
		$this->db->insert('comment', $data);
		redirect('home/suara_muhammadiyahdetail/' . $id);
	}





	// surat masuk user
	public function profile()
	{
		$data['judul'] = 'Profile';
		// Load data surat_masuk from the backend
		$data['profile'] = $this->Profile_Model->get_profile(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/profile/profile', $data);
		$this->load->view('templates/user_footer');
	}
	// surat masuk user
	public function artikel()
	{
		$data['judul'] = 'artikel';
		// Load data surat_masuk from the backend
		$data['artikel'] = $this->Profile_Model->get_artikel(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/profile/artikel', $data);
		$this->load->view('templates/user_footer');
	}

	public function kajian()
	{
		$data['judul'] = 'Kajian';
		// Load data surat_masuk from the backend
		$data['kajian_hadist'] = $this->Profile_Model->get_kajian_hadist(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/profile/kajian', $data);
		$this->load->view('templates/user_footer');
	}






	//USER AMAL USAHA
	public function Amal_Usaha_rumah()
	{
		$data['judul'] = 'Rumah Yatim & Dhuafa Tritonirmolo Timur';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/amal_usaha/rumah_yatimduafa');
		$this->load->view('templates/user_footer');
	}

	public function Amal_Usaha_masjid()
	{
		$data['judul'] = 'Masjid Musyawarah Tegal Wangi Tamantirto';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/amal_usaha/masjid_musyawarah');
		$this->load->view('templates/user_footer');
	}
	public function Amal_Usaha_Mushalla()
	{
		$data['judul'] = 'Masjid / Mushola Wakaf Muhammadiyah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/amal_usaha/masjid_mushalla');
		$this->load->view('templates/user_footer');
	}

	//USER PRM
	public function prm_tirto_utara()
	{
		$data['judul'] = 'PRM Tirtonirmolo Utara';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tirto_utara');
		$this->load->view('templates/user_footer');
	}

	public function prm_tirto_barat()
	{
		$data['judul'] = 'PRM Tirtonirmolo Barat';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tirto_barat');
		$this->load->view('templates/user_footer');
	}
	public function prm_tirto_tengah()
	{
		$data['judul'] = 'PRM Tirtonirmolo Tengah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tirto_tengah');
		$this->load->view('templates/user_footer');
	}
	public function prm_tirto_timur()
	{
		$data['judul'] = 'PRM Tirtonirmolo Timur';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tirto_timur');
		$this->load->view('templates/user_footer');
	}
	public function prm_tirto_selatan()
	{
		$data['judul'] = 'PRM Tirtonirmolo Selatan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tirto_selatan');
		$this->load->view('templates/user_footer');
	}
	public function prm_ngesti_utara()
	{
		$data['judul'] = 'PRM Ngestiharjo Utara';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_ngesti_utara');
		$this->load->view('templates/user_footer');
	}
	public function prm_ngesti_tengah()
	{
		$data['judul'] = 'PRM Ngestiharjo Tengah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_ngesti_tengah');
		$this->load->view('templates/user_footer');
	}
	public function prm_ngesti_selatan()
	{
		$data['judul'] = 'PRM Ngestiharjo Selatan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_ngesti_selatan');
		$this->load->view('templates/user_footer');
	}
	public function prm_bangunjiwo_barat()
	{
		$data['judul'] = 'PRM Bangunjiwo Barat';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_bangunjiwo_barat');
		$this->load->view('templates/user_footer');
	}
	public function prm_bangunjiwo_timur()
	{
		$data['judul'] = 'PRM Bangunjiwo Timur';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_bangunjiwo_timur');
		$this->load->view('templates/user_footer');
	}
	public function prm_tamantirto_utara()
	{
		$data['judul'] = 'PRM Tamantirto Utara';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tamantirto_utara');
		$this->load->view('templates/user_footer');
	}
	public function prm_tamantirto_selatan()
	{
		$data['judul'] = 'PRM Tamantirto Selatan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/prm/prm_tamantirto_selatan');
		$this->load->view('templates/user_footer');
	}

	//USER ORTOM
	public function pimpinan_cabang_aisyah()
	{
		$data['judul'] = 'Ortom Pimpinan Cabang Aisyiah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/pimpinan_cabang_aisyah');
		$this->load->view('templates/user_footer');
	}
	public function pim_cab_pemuda_muhammadiyah()
	{
		$data['judul'] = 'Ortom Pimpinan Cabang Pemuda Muhammadiyah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/pim_cab_pemuda_muhammadiyah');
		$this->load->view('templates/user_footer');
	}
	public function pim_cab_nasyiah()
	{
		$data['judul'] = 'Ortom Pimpinan Cabang Nasyiah';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/pim_cab_nasyiah');
		$this->load->view('templates/user_footer');
	}
	public function pim_cab_ipm()
	{
		$data['judul'] = 'Ortom Pimpinan Cabang IMP';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/pim_cab_ipm');
		$this->load->view('templates/user_footer');
	}
	public function kokam_kec_kasihan()
	{
		$data['judul'] = 'Ortom Kokam Kecamatan Kasihan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/kokam_kec_kasihan');
		$this->load->view('templates/user_footer');
	}
	public function hw_kec_kasihan()
	{
		$data['judul'] = 'Ortom HW Kecamatan Kashian';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/hw_kec_kasihan');
		$this->load->view('templates/user_footer');
	}
	public function ts_kec_kasihan()
	{
		$data['judul'] = 'Ortom TS Kecamatan Kasihan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/ortom/ts_kec_kasihan');
		$this->load->view('templates/user_footer');
	}

	//USER SEKOLAH
	public function sd_mst()
	{
		$data['judul'] = 'Sekolah SD Muhammadiyah Senggotan Tirtonirmolo';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sekolah/sd_mst');
		$this->load->view('templates/user_footer');
	}
	public function sd_mmt()
	{
		$data['judul'] = 'Sekolah SD Muhammadiyah Mrisi Tirtonirmolo';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sekolah/sd_mmt');
		$this->load->view('templates/user_footer');
	}
	public function sd_msb()
	{
		$data['judul'] = 'Sekolah SD Muhammadiyah Sambikerip Bangunjiwo';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sekolah/sd_msb');
		$this->load->view('templates/user_footer');
	}
	public function sd_mt()
	{
		$data['judul'] = 'Sekolah SD Muhammadiyah Tamantirto';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sekolah/sd_mt');
		$this->load->view('templates/user_footer');
	}
	public function sd_mkt()
	{
		$data['judul'] = 'Sekolah SD Muhammadiyah Kembaran Tamantirto';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sekolah/sd_mkt');
		$this->load->view('templates/user_footer');
	}

	//USER UNTUK ADMNOR
	//SURAT MASUK
	public function surat_masuk()
	{
		// Ambil semua data surat keputusan dari database
		$surat_masuk = $this->SuratMasuk_model->get_surat_masuk();

		// Kelompokkan data surat keputusan berdasarkan agenda
		$surat_masuk_by_agenda = array();
		foreach ($surat_masuk as $row) {
			$id_masuk = $row['agenda']; // Ubah ini dengan kolom yang sesuai dalam tabel surat keputusan
			$surat_masuk_by_agenda[$id_masuk][] = $row;
		}

		// Kirim data ke view
		$data['surat_masuk_by_agenda'] = $surat_masuk_by_agenda;
		$data['judul'] = 'Adminor Surat Masuk';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/surat_masuk', $data); // Ubah nama view dengan halaman user Anda
		$this->load->view('templates/user_footer');
	}

	//SURAT KELUAR
	public function surat_keluar()
	{
		// Ambil semua data surat keputusan dari database
		$surat_keluar = $this->SuratMasuk_model->get_surat_keluar();

		// Kelompokkan data surat keputusan berdasarkan agenda
		$surat_keluar_by_agenda = array();
		foreach ($surat_keluar as $row) {
			$id_keluar = $row['agenda']; // Ubah ini dengan kolom yang sesuai dalam tabel surat keputusan
			$surat_keluar_by_agenda[$id_keluar][] = $row;
		}

		// Kirim data ke view
		$data['surat_keluar_by_agenda'] = $surat_keluar_by_agenda;
		$data['judul'] = 'Adminor Surat Keluar';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/surat_keluar', $data); // Ubah nama view dengan halaman user Anda
		$this->load->view('templates/user_footer');
	}

	//UNTUK SURAT TUGAS
	public function surat_tugas()
	{
		$data['judul'] = 'Adminor Surat Tugas';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/surat_tugas');
		$this->load->view('templates/user_footer');
	}

	// START SURAT KEPUTUSAN UNTUK USER
	public function surat_keputusan()
	{
		// Ambil semua data surat keputusan dari database
		$surat_keputusan = $this->SuratMasuk_model->get_surat_keputusan();

		// Kelompokkan data surat keputusan berdasarkan agenda
		$surat_keputusan_by_agenda = array();
		foreach ($surat_keputusan as $row) {
			$id_keputusan = $row['agenda']; // Ubah ini dengan kolom yang sesuai dalam tabel surat keputusan
			$surat_keputusan_by_agenda[$id_keputusan][] = $row;
		}

		// Kirim data ke view
		$data['surat_keputusan_by_agenda'] = $surat_keputusan_by_agenda;
		$data['judul'] = 'Adminor Surat Keputusan';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/surat_keputusan', $data); // Ubah nama view dengan halaman user Anda
		$this->load->view('templates/user_footer');
	}

	// START NOTULENSI UNTUK USER
	public function notulen()
	{
		// Ambil semua data surat keputusan dari database
		$notulensi = $this->SuratMasuk_model->get_surat_notulensi();

		// Kelompokkan data surat keputusan berdasarkan agenda
		$surat_notulensi_by_agenda = array();
		foreach ($notulensi as $row) {
			$id_notulensi = $row['agenda']; // Ubah ini dengan kolom yang sesuai dalam tabel surat keputusan
			$surat_notulensi_by_agenda[$id_notulensi][] = $row;
		}

		// Kirim data ke view
		$data['surat_notulensi_by_agenda'] = $surat_notulensi_by_agenda;
		$data['judul'] = 'Adminor Notulensi';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/notulensi', $data); // Ubah nama view dengan halaman user Anda
		$this->load->view('templates/user_footer');
	}

	// START DAFTAR DAN SERTIFIKAT WAKAF UNTUK USER
	public function daftar_sertifikat_wakaf()
	{
		// Load data surat_masuk from the backend
		$data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf(); // Gantilah dengan fungsi sesuai kebutuhan
		$data['judul'] = 'Adminor Daftar Sertifikat Wakaf';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/daftar_sertifikat_wakaf', $data);
		$this->load->view('templates/user_footer');
	}

	// START SURAT AKTIF ORGANISASI UNTUK USER
	public function surat_aktif_org()
	{
		$this->load->library('upload');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
		$config['max_size'] = 9999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		$upload_failed = false;
		$file_path_kartu_tanda_anggota = '';
		$file_path_bukti_keaktifan = '';

		// Upload file undangan
		if (isset($_FILES['file_path_kartu_tanda_anggota']) && $_FILES['file_path_kartu_tanda_anggota']['size'] > 0) {
			if (!$this->upload->do_upload('file_path_kartu_tanda_anggota')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Gagal mengunggah file undangan: ' . $error);
				$upload_failed = true;
			} else {
				$upload_data = $this->upload->data();
				$file_path_kartu_tanda_anggota = $upload_data['file_name'];
			}
		}

		// Upload file photo
		if (isset($_FILES['file_path_bukti_keaktifan']) && $_FILES['file_path_bukti_keaktifan']['size'] > 0) {
			if (!$this->upload->do_upload('file_path_bukti_keaktifan')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Gagal mengunggah file photo: ' . $error);
				$upload_failed = true;
			} else {
				$upload_data = $this->upload->data();
				$file_path_bukti_keaktifan = $upload_data['file_name'];
			}
		}

		if (!$upload_failed) {
			$data = array(
				'email' => $this->input->post('email'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat_tinggal' => $this->input->post('alamat_tinggal'),
				'no_hp' => $this->input->post('no_hp'),
				'instansi_kerja' => $this->input->post('instansi_kerja'),
				'alamat_instansi_kerja' => $this->input->post('alamat_instansi_kerja'),
				'telepon_kantor_kerja' => $this->input->post('telepon_kantor_kerja'),
				'file_path_kartu_tanda_anggota' => $file_path_kartu_tanda_anggota,
				'file_path_bukti_keaktifan' => $file_path_bukti_keaktifan,
				'tempat_lahir' => $this->input->post('tempat_lahir'),
			);

			if (!empty($data['email']) && !empty($data['nama_lengkap']) && !empty($data['tanggal_lahir']) && !empty($data['alamat_tinggal']) && !empty($data['no_hp']) && !empty($data['instansi_kerja']) && !empty($data['alamat_instansi_kerja']) && !empty($data['telepon_kantor_kerja']) && !empty($data['tempat_lahir'])) {
				$result = $this->SuratMasuk_model->tambah_surat_aktif_organisasi($data);
				if ($result) {
					echo '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>';
					redirect('adminor/surat_aktif_org');
				} else {
					echo '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>';
				}
			}
		}
		// Load data surat_masuk from the backend
		$data['judul'] = 'Adminor Surat Aktif Organisasi'; // $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/adminor/surat_aktif_org');
		$this->load->view('templates/user_footer');
	}

	//USER PUSTAKA
	public function pustaka()
	{
		$data['judul'] = 'Pustaka';
		// Load data surat_masuk from the backend
		$data['pustaka'] = $this->Pustaka_Model->get_pustaka(); // Gantilah dengan fungsi sesuai kebutuhan

		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/pustaka/pustaka', $data);
		$this->load->view('templates/user_footer');
	}

	//USER UNTUK PERGURUAN
	public function perguruan_paud_tk()
	{
		$data['judul'] = 'Perguruan paud/tk';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/perguruan/perguruan_paud', $data);
		$this->load->view('templates/user_footer');
	}
	public function perguruan_dasar()
	{
		$data['judul'] = 'Perguruan Dasar';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/perguruan/perguruan_dasar');
		$this->load->view('templates/user_footer');
	}
	public function perguruan_atas()
	{
		$data['judul'] = 'Perguruan atas';
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/perguruan/perguruan_atas');
		$this->load->view('templates/user_footer');
	}
}
