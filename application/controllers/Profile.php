<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_Model');
	}


	// surat masuk user
	public function index()
	{
		// Load data surat_masuk from the backend
		$data['profile'] = $this->Profile_Model->get_profile(); // Gantilah dengan fungsi sesuai kebutuhan
		$this->load->view('templates/navbar');
		$this->load->view('profile', $data);
		$this->load->view('templates/footer');
	}
	// Start Profile Administration
	public function profile()
	{
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['profile'] = $this->Profile_Model->get_profile();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/profile/profile', $data);
		$this->load->view('templates/footer');
	}

	public function proses_upload()
	{
		// Mengambil data dari form
		$tahun_jabatan = $this->input->post('tahun_Jabatan');
		$nama_pejabat = $this->input->post('nama_pejabat');
		$avatar = $_FILES['avatar']['name'];

		// Validasi format tahun jabatan
		if (!preg_match('/^\d{4}-\d{4}$/', $tahun_jabatan)) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tahun Jabatan harus dalam format YYYY-YYYY!</div>');
			redirect('profile/profile'); // Redirect ke halaman profil jika format tidak valid
			return; // Menghentikan eksekusi lebih lanjut
		}

		// Proses upload gambar
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = 'profile_' . time(); // Membuat nama file unik

		$this->load->library('upload', $config);

		if ($avatar && $this->upload->do_upload('avatar')) {
			$avatar = $this->upload->data('file_name');
		} else {
			$avatar = 'default_avatar.jpg'; // Gunakan gambar default jika upload gagal
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('message', $error); // Tampilkan pesan error
		}

		// Menyimpan data ke database
		$data = [
			'tahun_jabatan' => $tahun_jabatan,
			'nama_pejabat' => $nama_pejabat,
			'avatar' => $avatar,
		];

		// Menyimpan profil baru ke database
		$this->Profile_Model->tambah_data_profile($data); // Pastikan model ini ada

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil ditambahkan</div>');
		redirect('profile/profile'); // Redirect ke halaman profil setelah berhasil
	}


	public function edit($id)
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['profile'] = $this->Profile_Model->get_profile_by_id($id); // Ganti dengan fungsi yang sesuai di model Anda

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/profile/edit_profile', $data); // Ganti sesuai dengan lokasi view Anda
		$this->load->view('templates/footer');
	}

	public function proses_edit($id)
	{
		$tahun_jabatan = $this->input->post('tahun_jabatan');
		$nama_pejabat = $this->input->post('nama_pejabat');
		$avatar = $_FILES['avatar']['name'];

		// Ambil data profil lama untuk referensi
		$old_profile = $this->Profile_Model->get_profile_by_id($id);
		$old_avatar = $old_profile['avatar']; // Menyimpan nama avatar lama

		// Proses upload jika ada gambar yang diupload
		if ($avatar) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = 'profile_' . time(); // Membuat nama file unik

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('avatar')) {
				// Hapus file gambar lama jika ada
				if (file_exists('./uploads/' . $old_avatar) && $old_avatar != 'default_avatar.jpg') {
					unlink('./uploads/' . $old_avatar);
				}

				// Ambil nama file yang baru
				$avatar = $this->upload->data('file_name');
			} else {
				// Jika gagal upload, tampilkan pesan error
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', $error);
				redirect('profile/profile/edit/' . $id); // Redirect kembali ke halaman edit
				return; // Menghentikan eksekusi lebih lanjut
			}
		} else {
			$avatar = $old_avatar; // Tidak ada upload, gunakan gambar lama
		}

		// Data baru untuk diupdate
		$data = [
			'tahun_jabatan' => $tahun_jabatan,
			'nama_pejabat' => $nama_pejabat,
			'avatar' => $avatar,
		];

		// Cek apakah ada perubahan data
		if (
			$data['tahun_jabatan'] == $old_profile['tahun_jabatan'] &&
			$data['nama_pejabat'] == $old_profile['nama_pejabat'] &&
			$data['avatar'] == $old_avatar
		) {

			// Jika tidak ada perubahan, tampilkan pesan
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data!</div>');
		} else {
			// Update profil dengan data baru
			$this->Profile_Model->update_profile($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil diperbarui!</div>');
		}

		redirect('profile/profile'); // Redirect ke halaman profile setelah update
	}



	public function delete($id)
	{
		$old_profile = $this->Profile_Model->get_profile_by_id($id);
		// Hapus file gambar jika ada
		if (file_exists('./uploads' . $old_profile['avatar'])) {
			unlink('./uploads' . $old_profile['avatar']);
		}

		$this->Profile_Model->delete_profile($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		redirect('profile/profile'); // Redirect ke halaman profile setelah delete
	}



	// Start Kajian Hadist Administration
	public function kajian_hadist()
	{
		$data['title'] = 'Kajian Hadist';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Ambil data kajian yang sudah ada di database
		$data['kajian_hadist'] = $this->Profile_Model->get_kajian_hadist();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/kajian_hadist/kajian_hadist', $data);
		$this->load->view('templates/footer');
	}

	public function upload_kajian()
	{
		$judul_kajian = $this->input->post('judul_kajian');
		$isi_kajian = $this->input->post('isi_kajian');

		// Cek apakah judul dan isi tidak kosong
		if (!empty($judul_kajian) && !empty($isi_kajian)) {
			$data = [
				'judul_kajian' => $judul_kajian,
				'isi_kajian' => $isi_kajian,
				'date_created' => date('Y-m-d H:i:s')
			];

			// Simpan data ke database
			$this->db->insert('Kajian_hadist', $data);

			// Set flashdata untuk pesan sukses
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kajian berhasil diunggah!</div>');
		} else {
			// Set flashdata jika ada input yang kosong
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Judul dan isi kajian tidak boleh kosong!</div>');
		}

		// Redirect ke halaman kajian hadist
		redirect('profile/kajian_hadist');
	}

	public function edit_kajian_hadist($id)
	{
		// Ambil data kajian lama
		$kajian_lama = $this->Profile_Model->get_kajian_by_id($id);

		// Jika tidak ada data kajian, redirect atau tampilkan pesan error
		if (!$kajian_lama) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kajian tidak ditemukan!</div>');
			redirect('profile/kajian_hadist'); // Ganti dengan halaman yang sesuai
			return;
		}

		// Cek apakah ada data POST
		if ($this->input->post()) {
			$judul_artikel = $this->input->post('judul_artikel');
			$isi_kajian = $this->input->post('isi_kajian');

			// Cek apakah ada perubahan data
			if ($kajian_lama['judul_artikel'] != $judul_artikel || $kajian_lama['isi_kajian'] != $isi_kajian) {
				$data = [
					'judul_artikel' => $judul_artikel,
					'isi_kajian' => $isi_kajian,
					'date_created' => date('Y-m-d H:i:s')
				];

				// Update data kajian
				$this->db->where('id_kajian', $id);
				$this->db->update('Kajian_hadist', $data);

				// Set flashdata untuk pesan sukses
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kajian berhasil diperbarui!</div>');
			} else {
				// Set flashdata jika tidak ada perubahan
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada perubahan data!</div>');
			}

			// Redirect untuk mencegah pengulangan pengiriman form
			redirect('profile/kajian_hadist'); // Ganti dengan halaman yang sesuai
			return;
		}

		// Data untuk ditampilkan di form
		$data['kajian'] = $kajian_lama; // Data lama untuk ditampilkan
		$data['title'] = 'Edit Kajian Hadist';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Memuat tampilan
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/kajian_hadist/edit_kajian_hadist', $data); // Pastikan view ini ada
		$this->load->view('templates/footer');
	}

	public function delete_kajian_hadist($id_kajian)
	{
		// Pastikan id_kajian tidak kosong
		if (empty($id_kajian)) {
			// Redirect atau tampilkan pesan error jika id tidak valid
			$this->session->set_flashdata('error', 'ID kajian tidak valid.');
			redirect('profile/kajian_hadist'); // Ganti dengan URL yang sesuai
			return;
		}

		// Panggil fungsi model untuk menghapus data
		$result = $this->Profile_Model->hapus_data_kajian($id_kajian);

		if ($result) {
			// Jika penghapusan berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
		} else {
			// Jika penghapusan gagal
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
		}

		// Redirect ke halaman yang sesuai
		redirect('profile/kajian_hadist'); // Ganti dengan URL yang sesuai
	}
	// End Kajian Hadist Administrator


	// Start Artikel Administrator
	public function artikel()
	{

		$data['title'] = 'Artikel';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['artikel'] = $this->Profile_Model->get_artikel();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/artikel/artikel', $data);
		$this->load->view('templates/footer');
	}

	public function upload_artikel()
	{
		$judul_artikel = $this->input->post('judul_artikel');
		$isi_artikel = $this->input->post('isi_artikel');

		// Cek apakah judul dan isi tidak kosong
		if (!empty($judul_artikel) && !empty($isi_artikel)) {
			$data = [
				'judul_artikel' => $judul_artikel,
				'isi_artikel' => $isi_artikel,
				'date_created' => date('Y-m-d H:i:s')
			];

			// Simpan data ke database
			$this->db->insert('artikel', $data);

			// Set flashdata untuk pesan sukses
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data artikel berhasil diunggah!</div>');
		} else {
			// Set flashdata jika ada input yang kosong
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Judul dan isi artikel tidak boleh kosong!</div>');
		}

		// Redirect ke halaman kajian hadist
		redirect('profile/artikel');
	}

	public function edit_artikel($id)
	{
		// Ambil data kajian lama
		$artikel_lama = $this->Profile_Model->get_artikel_by_id($id);

		// Jika tidak ada data kajian, redirect atau tampilkan pesan error
		if (!$artikel_lama) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Artikel tidak ditemukan!</div>');
			redirect('profile/artikel'); // Ganti dengan halaman yang sesuai
			return;
		}

		// Cek apakah ada data POST
		if ($this->input->post()) {
			$judul_artikel = $this->input->post('judul_artikel');
			$isi_artikel = $this->input->post('isi_artikel');

			// Cek apakah ada perubahan data
			if ($artikel_lama['judul_artikel'] != $judul_artikel || $artikel_lama['isi_artikel'] != $isi_artikel) {
				$data = [
					'judul_artikel' => $judul_artikel,
					'isi_artikel' => $isi_artikel,
					'date_created' => date('Y-m-d H:i:s')
				];

				// Update data kajian
				$this->db->where('id_artikel', $id);
				$this->db->update('artikel', $data);

				// Set flashdata untuk pesan sukses
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kajian berhasil diperbarui!</div>');
			} else {
				// Set flashdata jika tidak ada perubahan
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada perubahan data!</div>');
			}

			// Redirect untuk mencegah pengulangan pengiriman form
			redirect('profile/artikel'); // Ganti dengan halaman yang sesuai
			return;
		}

		// Data untuk ditampilkan di form
		$data['artikel'] = $artikel_lama; // Data lama untuk ditampilkan
		$data['title'] = 'Edit Artikel';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Memuat tampilan
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile/artikel/edit_artikel', $data); // Pastikan view ini ada
		$this->load->view('templates/footer');
	}

	public function delete_artikel($id)
	{
		// Cek apakah ID artikel yang diberikan valid
		if ($id) {
			// Hapus artikel dari database
			$this->db->where('id_artikel', $id);
			$this->db->delete('artikel');

			// Cek apakah penghapusan berhasil
			if ($this->db->affected_rows() > 0) {
				// Set flashdata untuk pesan sukses
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel berhasil dihapus!</div>');
			} else {
				// Set flashdata jika tidak ada artikel yang dihapus
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Artikel tidak ditemukan!</div>');
			}
		} else {
			// Set flashdata jika ID tidak valid
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID artikel tidak valid!</div>');
		}

		// Redirect ke halaman artikel
		redirect('profile/artikel');
	}
	// End Artikel Administration
}
