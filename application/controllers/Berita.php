<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // Cek session expiration secara manual
        $last_activity = $this->session->userdata('last_activity');
        $timeout_duration = 43200; // 12 jam dalam detik

        if ($last_activity && (time() - $last_activity > $timeout_duration)) {
            $this->session->sess_destroy(); // Hapus session jika expired
            redirect('auth/login'); // Redirect ke halaman login
        } else {
            // Update waktu aktivitas terakhir jika belum expired
            $this->session->set_userdata('last_activity', time());
        }

        // Cek apakah pengguna aktif
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user || !$user['is_active']) {
            redirect('auth/blocked'); // Redirect ke halaman blocked jika tidak aktif
        }

        $this->load->model('Data_Admin');
        $this->load->library('upload');
        $this->load->model('Berita_Model');
        $this->load->model('BreakingNews_model');
        $this->load->model('Galeri_Model');
        $this->load->model('Ibrah_Model');
        $this->load->model('KabarRanting_Model');
        $this->load->model('Pengumuman_Model');
        $this->load->model('Slider_Model');
        $this->load->model('Suaramuhammadiyah_Model');
    }

    // surat masuk admin
    public function berita()
    {

        $data['title'] = 'Berita Masa Kini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Berita_Model->get_berita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/berita/berita', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data_berita()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_berita' => $this->input->post('isi_berita'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('berita/berita');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_berita'])) {
            $result = $this->Berita_Model->tambah_data_berita($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/berita/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }
        $data['title'] = 'Tambah Berita Masa Kini';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/berita/tambah_data_berita', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_berita($id_berita)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data berita berdasarkan ID
        $berita = $this->Berita_Model->get_berita_by_id($id_berita);

        if (!$berita) {
            // Tampilkan pesan jika berita tidak ditemukan
            show_error('Berita tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal file
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah file jika ada
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Tambahkan path file ke data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($berita['avatar'])) {
                        unlink('./uploads/' . $berita['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_berita'] = $this->input->post('isi_berita');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah ada perubahan di data form (teks)
            if ($berita['judul_berita'] != $data['judul_berita'] || $berita['isi_berita'] != $data['isi_berita']) {
                $data_changed = true;
            }

            // Jika ada perubahan, update data
            if ($data_changed) {
                $this->Berita_Model->edit_data_berita($id_berita, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/berita/' . $id_berita);
        } else {
            // Load view untuk form edit berita
            $data['berita'] = $berita;
            $data['title'] = 'Edit Berita';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/berita/edit_data_berita', $data);
            $this->load->view('templates/footer');
        }
    }
    public function hapus_data_berita($id_berita)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_berita) && is_numeric($id_berita)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('Berita_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->Berita_Model->hapus_data_berita($id_berita);

            if ($result) {
                // Redirect atau tampilkan pesan sukses jika data berhasil dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/berita'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            echo "ID tidak valid.";
        }
    }

    // TAMPILAN BREAKING NEWS ADMIN
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
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/breaking_news');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->BreakingNews_model->tambah_data_breaking_news($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/breaking_news/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Breaking News';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/breaking_news/tambah_data_breaking_news', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_breaking_news($id_news)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data breaking news berdasarkan ID
        $breaking_news = $this->BreakingNews_model->get_news_by_id($id_news);

        if (!$breaking_news) {
            // Tampilkan pesan jika berita tidak ditemukan
            show_error('Breaking News tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Tambahkan path file ke data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($breaking_news['avatar'])) {
                        unlink('./uploads/' . $breaking_news['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah ada perubahan di data form (teks)
            if ($breaking_news['judul_berita'] != $data['judul_berita'] || $breaking_news['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan, update data
            if ($data_changed) {
                $this->BreakingNews_model->edit_data_breaking_news($id_news, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/breaking_news/' . $id_news);
        } else {
            // Load view untuk form edit breaking news
            $data['breaking_news'] = $breaking_news;
            $data['title'] = 'Edit Breaking News';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/breaking_news/edit_data_breaking_news', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/breaking_news'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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

        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/galeri');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->Galeri_Model->tambah_data_galeri($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/galeri/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Galeri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/galeri/tambah_data_galeri', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_galeri($id_galeri)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data galeri berdasarkan ID
        $galeri = $this->Galeri_Model->get_galeri_by_id($id_galeri);

        if (!$galeri) {
            // Tampilkan pesan jika galeri tidak ditemukan
            show_error('Galeri tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999;
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Cek apakah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Update path file baru ke dalam data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($galeri['avatar'])) {
                        unlink('./uploads/' . $galeri['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah data teks berubah
            if ($galeri['judul_berita'] != $data['judul_berita'] || $galeri['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan pada data, update ke database
            if ($data_changed) {
                $this->Galeri_Model->edit_data_galeri($id_galeri, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                // Jika tidak ada perubahan, tampilkan pesan
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/galeri/' . $id_galeri);
        } else {
            // Load view untuk form edit galeri
            $data['galeri'] = $galeri;
            $data['title'] = 'Edit Galeri';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/galeri/edit_data_galeri', $data);
            $this->load->view('templates/footer');
        }
    }
    public function hapus_data_galeri($id_galeri)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_galeri) && is_numeric($id_galeri)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('Galeri_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->Galeri_Model->hapus_data_galeri($id_galeri);

            if ($result) {
                // Redirect atau tampilkan pesan sukses jika data berhasil dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/galeri'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        $this->load->view('admin/berita/ibrah/ibrah', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data_ibrah()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/ibrah');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->Ibrah_Model->tambah_data_ibrah($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/ibrah/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Ibrah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/ibrah/tambah_data_ibrah', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_ibrah($id_ibrah)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data ibrah berdasarkan ID
        $ibrah = $this->Ibrah_Model->get_ibrah_by_id($id_ibrah);

        if (!$ibrah) {
            // Tampilkan pesan jika ibrah tidak ditemukan
            show_error('Data Ibrah tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999;
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Cek apakah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Update path file baru ke dalam data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($ibrah['avatar'])) {
                        unlink('./uploads/' . $ibrah['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah data teks berubah
            if ($ibrah['judul_berita'] != $data['judul_berita'] || $ibrah['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan pada data, update ke database
            if ($data_changed) {
                $this->Ibrah_Model->edit_data_ibrah($id_ibrah, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                // Jika tidak ada perubahan, tampilkan pesan
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/ibrah/' . $id_ibrah);
        } else {
            // Load view untuk form edit ibrah
            $data['ibrah'] = $ibrah;
            $data['title'] = 'Edit Ibrah';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/ibrah/edit_data_ibrah', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/ibrah'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/kabar_ranting');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->KabarRanting_Model->tambah_data_kabar_ranting($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/kabar_ranting/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Kabar Ranting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kabar_ranting'] = $this->KabarRanting_Model->get_kabar_ranting();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/kabar_ranting/tambah_data_kabar_ranting', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_kabar_ranting($id_kabar_ranting)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data kabar ranting berdasarkan ID
        $kabar_ranting = $this->KabarRanting_Model->get_kabar_ranting_by_id($id_kabar_ranting);

        if (!$kabar_ranting) {
            // Tampilkan pesan jika kabar ranting tidak ditemukan
            show_error('Kabar Ranting tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999;
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Update path file baru ke dalam data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($kabar_ranting['avatar'])) {
                        unlink('./uploads/' . $kabar_ranting['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah data teks berubah
            if ($kabar_ranting['judul_berita'] != $data['judul_berita'] || $kabar_ranting['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan pada data, update ke database
            if ($data_changed) {
                $this->KabarRanting_Model->edit_data_kabar_ranting($id_kabar_ranting, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                // Jika tidak ada perubahan, tampilkan pesan
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/kabar_ranting/' . $id_kabar_ranting);
        } else {
            // Load view untuk form edit kabar ranting
            $data['kabar_ranting'] = $kabar_ranting;
            $data['title'] = 'Edit Kabar Ranting';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/kabar_ranting/edit_data_kabar_ranting', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/kabar_ranting'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/pengumuman');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->Pengumuman_Model->tambah_data_pengumuman($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/pengumuman/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }


        $data['title'] = 'Tambah Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengumuman'] = $this->Pengumuman_Model->get_pengumuman();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/pengumuman/tambah_data_pengumuman', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_pengumuman($id_pengumuman)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data pengumuman berdasarkan ID
        $pengumuman = $this->Pengumuman_Model->get_pengumuman_by_id($id_pengumuman);

        if (!$pengumuman) {
            // Tampilkan pesan jika pengumuman tidak ditemukan
            show_error('Pengumuman tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false; // Variabel untuk cek perubahan data

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999;
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah file diunggah
            if (!empty($_FILES['avatar']['name'])) {
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Update path file avatar ke data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($pengumuman['avatar'])) {
                        unlink('./uploads/' . $pengumuman['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah ada perubahan pada data teks
            if ($pengumuman['judul_berita'] != $data['judul_berita'] || $pengumuman['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan data, lakukan update
            if ($data_changed) {
                $this->Pengumuman_Model->edit_data_pengumuman($id_pengumuman, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/pengumuman/' . $id_pengumuman);
        } else {
            // Load view untuk form edit pengumuman
            $data['pengumuman'] = $pengumuman;
            $data['title'] = 'Edit Pengumuman';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/pengumuman/edit_data_pengumuman', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/pengumuman'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        $this->load->view('admin/berita/slider/slider', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data_slider()
    {

        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/slider');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->Slider_Model->tambah_data_slider($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/slider/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Slider';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['slider'] = $this->Slider_Model->get_slider();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/slider/tambah_data_slider', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_slider($id_slider)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data slider berdasarkan ID
        $slider = $this->Slider_Model->get_slider_by_id($id_slider);

        if (!$slider) {
            // Tampilkan pesan jika slider tidak ditemukan
            show_error('Slider tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false; // Variabel untuk cek perubahan data

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal file
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Update path file avatar ke data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($slider['avatar'])) {
                        unlink('./uploads/' . $slider['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah ada perubahan pada data teks
            if ($slider['judul_berita'] != $data['judul_berita'] || $slider['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan data, lakukan update
            if ($data_changed) {
                $this->Slider_Model->edit_data_slider($id_slider, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/slider/' . $id_slider);
        } else {
            // Load view untuk form edit slider
            $data['slider'] = $slider;
            $data['title'] = 'Edit Slider';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/slider/edit_data_slider', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/slider'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_content' => $this->input->post('isi_content'),
            'avatar' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['avatar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('avatar')) {
                $upload_data = $this->upload->data();
                $data['avatar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('berita/suara_muhammadiyah');
            }
        }


        if (!empty($data['judul_berita']) && !empty($data['isi_content'])) {
            $result = $this->Suaramuhammadiyah_Model->tambah_data_suaramuhammadiyah($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('berita/suara_muhammadiyah/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }


        $data['title'] = 'Tambah Suara Muhammadiyah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/berita/suara_muhammadiyah/tambah_data_suara_muhammadiyah', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_suara_muhammadiyah($id_suara)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data suara Muhammadiyah berdasarkan ID
        $suara_muhammadiyah = $this->Suaramuhammadiyah_Model->get_suaramuhammadiyah_by_id($id_suara);

        if (!$suara_muhammadiyah) {
            // Tampilkan pesan jika data tidak ditemukan
            show_error('Data tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false; // Variabel untuk mengecek apakah ada perubahan data

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal file
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['avatar']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('avatar')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $avatar = $upload_data['file_name'];

                    // Tambahkan path file avatar ke data
                    $data['avatar'] = $avatar;
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($suara_muhammadiyah['avatar'])) {
                        unlink('./uploads/' . $suara_muhammadiyah['avatar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['judul_berita'] = $this->input->post('judul_berita');
            $data['isi_content'] = $this->input->post('isi_content');
            $data['tanggal_upload'] = $current_datetime;

            // Cek apakah ada perubahan data teks
            if ($suara_muhammadiyah['judul_berita'] != $data['judul_berita'] || $suara_muhammadiyah['isi_content'] != $data['isi_content']) {
                $data_changed = true;
            }

            // Jika ada perubahan data, lakukan update
            if ($data_changed) {
                $this->Suaramuhammadiyah_Model->edit_data_suaramuhammadiyah($id_suara, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('berita/suara_muhammadiyah/' . $id_suara);
        } else {
            // Load view untuk form edit suara Muhammadiyah
            $data['suara_muhammadiyah'] = $suara_muhammadiyah;
            $data['title'] = 'Edit Suara Muhammadiyah';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/berita/suara_muhammadiyah/edit_data_suara_muhammadiyah', $data);
            $this->load->view('templates/footer');
        }
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('berita/suara_muhammadiyah'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
    }
}
