<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminor extends CI_Controller
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
        $this->load->model('SuratMasuk_model');
    }

    // surat masuk admin
    public function surat()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasuk_model->get_surat_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/surat_masuk', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_masuk()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'agenda' => $this->input->post('agenda'),
            'file_path' => ''
        );
        // Memeriksa apakah ada file yang dipilih untuk diunggah
        if (!empty($_FILES['file_path']['name'])) {
            // Jika ada file yang dipilih, lakukan unggah
            if ($this->upload->do_upload('file_path')) {
                $upload_data = $this->upload->data();
                $data['file_path'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('adminor/surat');
            }
        }
        // Memeriksa apakah nama_surat diisi dalam form
        if (!empty($this->input->post('nama_surat'))) {
            // Jika diisi, gunakan nilai dari form
            $data['nama_surat'] = $this->input->post('nama_surat');
        } else {
            // Jika tidak diisi, berikan nilai default
            $data['nama_surat'] = 'Belum ada nama surat';
        }

        // Pastikan data agenda tidak kosong sebelum menyisipkan ke dalam database
        if (!empty($data['agenda'])) {
            $result = $this->SuratMasuk_model->tambah_surat($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>');
                redirect('adminor/surat/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua field harus diisi.</div>');
        }
        $data['title'] = 'Tambah Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/tambah_surat_masuk', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_masuk_agenda()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // Ukuran dalam KB

        $this->upload->initialize($config);

        $data = array(
            'agenda' => $this->input->post('agenda'), // Menyimpan agenda
            'nama_surat' => $this->input->post('nama_surat'),
            'file_path' => ''
        );

        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['file_path']['name'])) {
            // Lakukan upload file
            if ($this->upload->do_upload('file_path')) {
                $upload_data = $this->upload->data();
                $data['file_path'] = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');

                redirect('adminor/surat');
            }
        }
        // Pastikan agenda dan nama_surat tidak kosong
        if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
            $result = $this->SuratMasuk_model->tambah_surat($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>');
                redirect('adminor/surat');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua field harus diisi.</div>');
        }
        // Load ulang data agenda untuk ditampilkan di view jika gagal
        $data['agenda_list'] = $this->SuratMasuk_model->get_agenda_list_surat_masuk();
        $data['title'] = 'Tambah Surat Masuk Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/tambah_surat_masuk_agenda', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_surat_masuk($id_masuk)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data surat masuk berdasarkan ID
        $surat_masuk = $this->SuratMasuk_model->get_data_by_id($id_masuk);

        if (!$surat_masuk) {
            // Tampilkan pesan jika surat masuk tidak ditemukan
            show_error('Surat Masuk tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal file
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Kondisi apakah ada perubahan data
            $data_changed = false;

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['gambarBerita']['name'])) {
                // Lakukan unggah file jika ada
                if ($this->upload->do_upload('gambarBerita')) {
                    $upload_data = $this->upload->data();
                    $file_path = $upload_data['file_name'];
                    $data['file_path'] = $file_path; // Tambahkan path file ke data
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($surat_masuk['file_path'])) {
                        unlink('./uploads/' . $surat_masuk['file_path']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['agenda'] = $this->input->post('agenda');
            $data['nama_surat'] = $this->input->post('nama_surat');
            $data['tanggal'] = $current_datetime;

            // Cek apakah ada perubahan di data form (teks)
            if ($surat_masuk['agenda'] != $data['agenda'] || $surat_masuk['nama_surat'] != $data['nama_surat']) {
                $data_changed = true;
            }

            // Jika ada perubahan, update data
            if ($data_changed) {
                $this->SuratMasuk_model->edit_data_surat_masuk($id_masuk, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('adminor/surat/' . $id_masuk);
        } else {
            // Load view untuk form edit surat masuk
            $data['title'] = 'Edit Surat Masuk';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['surat_masuk'] = $surat_masuk;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminor/surat_masuk/edit_surat_masuk', $data);
            $this->load->view('templates/footer');
        }
    }


    // HAPUS DATA SURAT MASUK
    public function hapus_data($id_masuk)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_masuk) && is_numeric($id_masuk)) {
            // Panggil model untuk menghapus data
            $this->load->model('SuratMasuk_model');

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data($id_masuk);

            if ($result) {
                // Set flashdata untuk pesan sukses
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Set flashdata untuk pesan error jika gagal dihapus
                $this->session->set_flashdata('error', 'Gagal menghapus data.');
            }
            // Redirect ke halaman surat
            redirect('adminor/surat');
        } else {
            // Set flashdata untuk pesan error jika ID tidak valid
            $this->session->set_flashdata('error', 'ID tidak valid.');
            redirect('adminor/surat');
        }
    }
    // END HAPUS DATA


    //surat keluar untuk admin
    public function surat_kel()
    {

        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->SuratMasuk_model->get_surat_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_keluar()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 9999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $upload_failed = false;
        $file_path_surat = '';
        $file_path_undangan = '';
        $file_path_photo = '';

        // Upload file surat
        if (isset($_FILES['file_path_surat']) && $_FILES['file_path_surat']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_surat')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_surat = $upload_data['file_name'];
            }
        }

        // Upload file undangan
        if (isset($_FILES['file_path_undangan']) && $_FILES['file_path_undangan']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_undangan')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_undangan = $upload_data['file_name'];
            }
        }

        // Upload file photo
        if (isset($_FILES['file_path_photo']) && $_FILES['file_path_photo']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_photo')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_photo = $upload_data['file_name'];
            }
        }

        if (!$upload_failed) {
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'file_path_surat' => $file_path_surat,
                'file_path_undangan' => $file_path_undangan,
                'file_path_photo' => $file_path_photo
            );

            if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
                $result = $this->SuratMasuk_model->tambah_surat_keluar($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>');
                    redirect('adminor/surat_kel');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
                }
            }
        }

        $data['title'] = 'Tambah Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/tambah_surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_keluar_agenda()
    {
        // Load library 'upload' untuk mengelola file upload
        $this->load->library('upload');

        // Konfigurasi upload file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 9999999999; // Sesuaikan ukuran file maksimum (dalam KB)
        $config['encrypt_name'] = TRUE; // Enkripsi nama file agar unik

        // Inisialisasi upload
        $this->upload->initialize($config);

        // Ambil data dari input form
        $data = array(
            'agenda' => $this->input->post('agenda'), // Menyimpan agenda yang dipilih
            'nama_surat' => $this->input->post('nama_surat'),
            'file_path' => ''
        );

        // Variabel untuk menyimpan status file upload
        $upload_failed = false;
        $file_path_surat = '';
        $file_path_undangan = '';
        $file_path_photo = '';

        // Upload file surat
        if (isset($_FILES['file_path_surat']) && $_FILES['file_path_surat']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_surat')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file surat: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_surat = $upload_data['file_name'];
            }
        }

        // Upload file undangan
        if (isset($_FILES['file_path_undangan']) && $_FILES['file_path_undangan']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_undangan')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file undangan: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_undangan = $upload_data['file_name'];
            }
        }

        // Upload file photo
        if (isset($_FILES['file_path_photo']) && $_FILES['file_path_photo']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_photo')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file photo: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_photo = $upload_data['file_name'];
            }
        }

        // Jika semua file berhasil diupload, simpan data ke database
        if (!$upload_failed) {
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'file_path_surat' => $file_path_surat,
                'file_path_undangan' => $file_path_undangan,
                'file_path_photo' => $file_path_photo
            );

            // Pastikan data agenda dan nama surat tidak kosong
            if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
                // Simpan data surat keluar ke dalam database
                $result = $this->SuratMasuk_model->tambah_surat_keluar($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>');
                    redirect('adminor/surat_kel');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
                }
            }
        }

        // Load agenda untuk ditampilkan di form tambah surat keluar
        $data['agenda_list'] = $this->SuratMasuk_model->get_agenda_list_surat_keluar();
        $data['title'] = 'Tambah Surat Keluar Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/tambah_surat_keluar_agenda', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_keluar($id_keluar)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data surat keluar berdasarkan ID
        $surat_keluar = $this->SuratMasuk_model->data_out_by_id($id_keluar);

        if (!$surat_keluar) {
            // Tampilkan pesan jika surat keluar tidak ditemukan
            show_error('Surat Keluar tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 99999999; // 2MB
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Kondisi apakah data berubah
            $data_changed = false;

            // Periksa apakah ada file yang diunggah
            if (!empty($_FILES['file_path_surat']['name'])) {
                // Lakukan unggah file surat
                if ($this->upload->do_upload('file_path_surat')) {
                    $upload_data = $this->upload->data();
                    $file_path_surat = $upload_data['file_name'];
                    $data['file_path_surat'] = $file_path_surat;
                    $data_changed = true;
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            if (!empty($_FILES['file_path_undangan']['name'])) {
                // Lakukan unggah file undangan
                if ($this->upload->do_upload('file_path_undangan')) {
                    $upload_data = $this->upload->data();
                    $file_path_undangan = $upload_data['file_name'];
                    $data['file_path_undangan'] = $file_path_undangan;
                    $data_changed = true;
                } else {
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            if (!empty($_FILES['file_path_photo']['name'])) {
                // Lakukan unggah file photo
                if ($this->upload->do_upload('file_path_photo')) {
                    $upload_data = $this->upload->data();
                    $file_path_photo = $upload_data['file_name'];
                    $data['file_path_photo'] = $file_path_photo;
                    $data_changed = true;
                } else {
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $data['agenda'] = $this->input->post('agenda');
            $data['nama_surat'] = $this->input->post('nama_surat');
            $data['tanggal'] = $current_datetime;

            // Cek apakah ada perubahan di data form (text)
            if ($surat_keluar['agenda'] != $data['agenda'] || $surat_keluar['nama_surat'] != $data['nama_surat']) {
                $data_changed = true;
            }

            // Jika ada perubahan, update data
            if ($data_changed) {
                $this->SuratMasuk_model->edit_data_surat_keluar($id_keluar, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('adminor/surat_kel/' . $id_keluar);
        } else {
            // Load view untuk form edit surat keluar
            $data['title'] = 'Edit Surat Keluar';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['surat_keluar'] = $surat_keluar;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminor/surat_keluar/edit_surat_keluar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus_data_keluar($id_keluar)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_keluar) && is_numeric($id_keluar)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('SuratMasuk_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data_keluar($id_keluar);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            // Redirect ke halaman surat
            redirect('adminor/surat_kel');
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            // Set flashdata untuk pesan error jika ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
            redirect('adminor/surat_kel');
        }
    }
    // END SURAT KELUAR



    //SURAT KEP UNTUK ADMIN
    public function surat_kep()
    {
        $data['title'] = 'Surat Keputusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/surat_keputusan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_keputusan()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'agenda' => $this->input->post('agenda'),
            'nama_surat' => $this->input->post('nama_surat'),
            'file_path' => ''
        );


        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['file_path']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('file_path')) {
                $upload_data = $this->upload->data();
                $data['file_path'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('adminor/surat_kep/');
            }
        }

        // Pastikan data nama_surat_wakaf dan nama_masjid tidak kosong sebelum menyisipkan ke dalam database
        if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
            $result = $this->SuratMasuk_model->tambah_surat_keputusan($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data.</div>');
                redirect('adminor/surat_kep/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua File Harus DIisi!</div>');
        }

        $data['title'] = 'Tambah Surat Keputusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/tambah_surat_keputusan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_keputusan_agenda()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'agenda' => $this->input->post('agenda'), // Menyimpan ID agenda
            'nama_surat' => $this->input->post('nama_surat'),
            'file_path' => ''
        );

        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['file_path']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('file_path')) {
                $upload_data = $this->upload->data();
                $data['file_path'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('adminor/surat_kep/');
            }
        }

        // Pastikan data agenda dan nama_surat tidak kosong sebelum menyisipkan ke dalam database
        if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
            $result = $this->SuratMasuk_model->tambah_surat_keputusan($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('adminor/surat_kep/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Semua file harus diisi!.</div>');
        }

        // Load view setelah proses selesai
        $data['agenda_list'] = $this->SuratMasuk_model->get_agenda_list();
        $data['title'] = 'Tambah Surat Keputusan Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/tambah_surat_keputusan_agenda', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_keputusan($id_keputusan)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data surat masuk berdasarkan ID
        $surat_keputusan = $this->SuratMasuk_model->data_by_id($id_keputusan);

        if (!$surat_keputusan) {
            // Tampilkan pesan jika surat masuk tidak ditemukan
            show_error('Surat Masuk tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');

            // Ambil data dari form
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'tanggal' => $current_datetime // Perbarui tanggal dengan waktu saat ini
            );

            // Kondisi apakah data berubah
            $data_changed = false;

            // Periksa apakah ada perubahan di data text (agenda, nama_surat)
            if ($surat_keputusan['agenda'] != $data['agenda'] || $surat_keputusan['nama_surat'] != $data['nama_surat']) {
                $data_changed = true;
            }

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // 2MB
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah sebuah file dipilih untuk diunggah
            if (!empty($_FILES['gambarBerita']['name'])) {
                // Lakukan unggah jika ada file yang dipilih
                if ($this->upload->do_upload('gambarBerita')) {
                    // Ambil informasi file yang diunggah
                    $upload_data = $this->upload->data();
                    $file_path = $upload_data['file_name'];

                    // Update data file_path
                    $data['file_path'] = $file_path;
                    $data_changed = true; // Data berubah karena ada file baru yang diunggah

                    // Hapus gambar lama jika ada
                    if (!empty($surat_keputusan['file_path'])) {
                        unlink('./uploads/' . $surat_keputusan['file_path']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Jika ada perubahan data atau file, lakukan update
            if ($data_changed) {
                $this->SuratMasuk_model->edit_data_keputusan($id_keputusan, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('adminor/surat_kep/' . $id_keputusan);
        } else {
            // Load view untuk form edit surat masuk
            $data['surat_keputusan'] = $surat_keputusan;
            $data['title'] = 'Edit Surat Keputusan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminor/surat_keputusan/edit_surat_keputusan', $data);
            $this->load->view('templates/footer');
        }
    }
    // HAPUS DATA SURAT MASUK
    public function hapus_data_keputusan($id_keputusan)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_keputusan) && is_numeric($id_keputusan)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('SuratMasuk_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data_keputusan($id_keputusan);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            // Redirect ke halaman surat
            redirect('adminor/surat_kep/');
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
    }
    // END SURAT KEPUTUSAN



    //UNTUK ADMIN
    public function notulensi()
    {

        $data['title'] = 'Notulensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notulensi'] = $this->SuratMasuk_model->get_surat_notulensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/notulensi', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_notulensi()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 9999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $upload_failed = false;
        $file_path_undangan = '';
        $file_path_notulensi = '';

        // Upload file undangan
        if (isset($_FILES['file_path_undangan']) && $_FILES['file_path_undangan']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_undangan')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file undangan: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_undangan = $upload_data['file_name'];
            }
        }

        // Upload file photo
        if (isset($_FILES['file_path_notulensi']) && $_FILES['file_path_notulensi']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_notulensi')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file photo: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_notulensi = $upload_data['file_name'];
            }
        }

        if (!$upload_failed) {
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'file_path_undangan' => $file_path_undangan,
                'file_path_notulensi' => $file_path_notulensi
            );

            if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
                $result = $this->SuratMasuk_model->tambah_surat_notulensi($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                    redirect('adminor/notulensi');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
                }
            }
        }

        $data['title'] = 'Tambah Notulensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/tambah_notulensi', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_notulensi_agenda()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 9999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $upload_failed = false;
        $file_path_undangan = '';
        $file_path_notulensi = '';

        // Upload file undangan
        if (isset($_FILES['file_path_undangan']) && $_FILES['file_path_undangan']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_undangan')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file undangan: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_undangan = $upload_data['file_name'];
            }
        }

        // Upload file photo
        if (isset($_FILES['file_path_notulensi']) && $_FILES['file_path_notulensi']['size'] > 0) {
            if (!$this->upload->do_upload('file_path_notulensi')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file photo: ' . $error);
                $upload_failed = true;
            } else {
                $upload_data = $this->upload->data();
                $file_path_notulensi = $upload_data['file_name'];
            }
        }

        if (!$upload_failed) {
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'file_path_undangan' => $file_path_undangan,
                'file_path_notulensi' => $file_path_notulensi
            );

            if (!empty($data['agenda']) && !empty($data['nama_surat'])) {
                $result = $this->SuratMasuk_model->tambah_surat_notulensi($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                    redirect('adminor/notulensi');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
                }
            }
        }

        // Load view setelah proses selesai
        $data['agenda_list'] = $this->SuratMasuk_model->get_agenda_list_surat_notulensi();
        $data['title'] = 'Tambah Notulensi Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/tambah_notulensi_agenda', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_notulensi($id_notulensi)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data notulensi berdasarkan ID
        $notulensi = $this->SuratMasuk_model->data_notulensi_by_id($id_notulensi);

        if (!$notulensi) {
            // Tampilkan pesan jika notulensi tidak ditemukan
            show_error('Notulensi tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {

            $current_datetime = date('Y-m-d H:i:s');

            // Ambil data dari form
            $data = array(
                'agenda' => $this->input->post('agenda'),
                'nama_surat' => $this->input->post('nama_surat'),
                'tanggal' =>  $current_datetime // Perbarui tanggal dengan waktu saat ini
            );

            // Kondisi apakah data berubah
            $data_changed = false;

            // Periksa apakah ada perubahan di data text (agenda, nama_surat)
            if ($notulensi['agenda'] != $data['agenda'] || $notulensi['nama_surat'] != $data['nama_surat']) {
                $data_changed = true;
            }

            // Konfigurasi library upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 99999999; // 2MB
            $config['encrypt_name'] = TRUE;

            // Inisialisasi library upload dengan konfigurasi
            $this->upload->initialize($config);

            // Periksa apakah file undangan diunggah
            $file_path_undangan = $notulensi['file_path_undangan'];
            if (!empty($_FILES['file_path_undangan']['name'])) {
                if ($this->upload->do_upload('file_path_undangan')) {
                    $upload_data = $this->upload->data();
                    $file_path_undangan = $upload_data['file_name'];
                    $data_changed = true; // Jika file diunggah, data dianggap berubah
                } else {
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Periksa apakah file notulensi diunggah
            $file_path_notulensi = $notulensi['file_path_notulensi'];
            if (!empty($_FILES['file_path_notulensi']['name'])) {
                if ($this->upload->do_upload('file_path_notulensi')) {
                    $upload_data = $this->upload->data();
                    $file_path_notulensi = $upload_data['file_name'];
                    $data_changed = true; // Jika file diunggah, data dianggap berubah
                } else {
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Update path file jika ada perubahan file undangan
            if ($file_path_undangan != $notulensi['file_path_undangan']) {
                $data['file_path_undangan'] = $file_path_undangan;
            }

            // Update path file jika ada perubahan file notulensi
            if ($file_path_notulensi != $notulensi['file_path_notulensi']) {
                $data['file_path_notulensi'] = $file_path_notulensi;
            }

            // Jika ada perubahan data atau file, lakukan update
            if ($data_changed) {
                $this->SuratMasuk_model->edit_data_surat_notulensi($id_notulensi, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman yang sesuai
            redirect('adminor/notulensi/' . $id_notulensi);
        } else {
            // Load view untuk form edit notulensi
            $data['notulensi'] = $notulensi;

            $data['title'] = 'Edit Notulensi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminor/notulensi/edit_notulensi', $data);
            $this->load->view('templates/footer');
        }
    }
    public function hapus_data_notulensi($id_notulensi)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_notulensi) && is_numeric($id_notulensi)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('SuratMasuk_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data_notulensi($id_notulensi);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            // Redirect ke halaman surat
            redirect('adminor/notulensi/');
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
    }
    // END NOTULENSI



    //UNTUK ADMIN
    public function wakaf()
    {

        $data['title'] = 'Daftar Dan Sertifikat Wakaf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_wakaf/surat_wakaf', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_surat_wakaf()
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan

        $this->upload->initialize($config);

        $data = array(
            'nama_surat_wakaf' => $this->input->post('nama_surat_wakaf'),
            'nama_masjid' => $this->input->post('nama_masjid'),
            'file_path_sertifikat_wakaf' => ''
        );

        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['file_path_sertifikat_wakaf']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('file_path_sertifikat_wakaf')) {
                $upload_data = $this->upload->data();
                $data['file_path_sertifikat_wakaf'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $error);
                redirect('adminor/wakaf');
            }
        }

        // Pastikan data nama_surat_wakaf dan nama_masjid tidak kosong sebelum menyisipkan ke dalam database
        if (!empty($data['nama_surat_wakaf']) && !empty($data['nama_masjid'])) {
            $result = $this->SuratMasuk_model->tambah_surat_wakaf($data);

            if ($result) {
                // Redirect ke halaman surat_masuk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');

                redirect('adminor/wakaf/');
            } else {
                // Tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
            }
        } else {
            // Tampilkan pesan error bahwa data tidak lengkap
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        $data['title'] = 'Tambah Surat Wakaf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_wakaf/tambah_surat_wakaf', $data);
        $this->load->view('templates/footer');
    }
    public function edit_data_wakaf($id_wakaf)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Memuat library upload
        $this->load->library('upload');

        // Ambil data surat masuk berdasarkan ID
        $sertifikat_wakaf = $this->SuratMasuk_model->data_wakaf_by_id($id_wakaf);

        if (!$sertifikat_wakaf) {
            // Tampilkan pesan jika surat masuk tidak ditemukan
            show_error('Surat Wakaf tidak ditemukan!');
        }

        // Proses pengiriman form
        if ($this->input->post()) {
            $current_datetime = date('Y-m-d H:i:s');

            // Ambil data dari form
            $data_input = array(
                'nama_surat_wakaf' => $this->input->post('nama_surat_wakaf'),
                'nama_masjid' => $this->input->post('nama_masjid'),
                'tanggal' => $current_datetime
            );

            // Periksa apakah ada perubahan data
            if (
                $data_input['nama_surat_wakaf'] == $sertifikat_wakaf['nama_surat_wakaf'] &&
                $data_input['nama_masjid'] == $sertifikat_wakaf['nama_masjid'] &&
                empty($_FILES['gambarBerita']['name'])
            ) {
                // Jika tidak ada perubahan, tampilkan pesan bahwa tidak ada perubahan
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data.</div>');
                redirect('adminor/wakaf/' . $id_wakaf);
            } else {
                // Konfigurasi library upload jika ada file baru yang diunggah
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
                $config['max_size'] = 999999999; // 2MB
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);

                // Periksa apakah sebuah file dipilih untuk diunggah
                if (!empty($_FILES['gambarBerita']['name'])) {
                    // Lakukan unggah jika ada file yang dipilih
                    if ($this->upload->do_upload('gambarBerita')) {
                        // Ambil informasi file yang diunggah
                        $upload_data = $this->upload->data();
                        $file_path_sertifikat_wakaf = $upload_data['full_path'];

                        // Perbarui path file avatar
                        $this->SuratMasuk_model->update_file_path_wakaf($id_wakaf, $file_path_sertifikat_wakaf, $sertifikat_wakaf['file_path_sertifikat_wakaf']);

                        // Hapus gambar lama jika ada
                        if (!empty($sertifikat_wakaf['file_path_sertifikat_wakaf'])) {
                            unlink('./uploads/' . $sertifikat_wakaf['file_path_sertifikat_wakaf']);
                        }
                    } else {
                        // Tampilkan pesan error jika unggah gagal
                        $error = $this->upload->display_errors();
                        echo $error;
                    }
                }

                // Perbarui data teks surat masuk
                $this->SuratMasuk_model->edit_data_wakaf($id_wakaf, $data_input);

                // Tampilkan pesan sukses
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data</div>');
                redirect('adminor/wakaf/' . $id_wakaf);
            }
        } else {
            // Load view untuk form edit surat masuk
            $data['sertifikat_wakaf'] = $sertifikat_wakaf;
            $data['title'] = 'Edit Surat Wakaf';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/adminor/surat_wakaf/edit_surat_wakaf', $data);
            $this->load->view('templates/footer');
        }
    }
    // HAPUS DATA SURAT MASUK
    public function hapus_data_wakaf($id_wakaf)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_wakaf) && is_numeric($id_wakaf)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('SuratMasuk_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data_wakaf($id_wakaf);

            if ($result) {
                // Redirect atau tampilkan pesan sukses jika data berhasil dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('adminor/wakaf'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
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
        // $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('adminor/surat_aktif_org');
        $this->load->view('templates/footer');
    }
    //UNTUK BAGIAN ADMIN
    public function surat_aktif_organisasi()
    {

        $data['title'] = 'Surat Aktif Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_aktif_organisasi'] = $this->SuratMasuk_model->get_surat_aktif_organisasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_organisasi/surat_aktif_organisasi', $data);
        $this->load->view('templates/footer');
        // Load data surat_masuk from the backend
    }

    public function tambah_surat_aktif_organisasi()
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
                'tanggal_upload' => date('Y-m-d H:i:s'),
            );

            if (!empty($data['email']) && !empty($data['nama_lengkap']) && !empty($data['tanggal_lahir']) && !empty($data['alamat_tinggal']) && !empty($data['no_hp']) && !empty($data['instansi_kerja']) && !empty($data['alamat_instansi_kerja']) && !empty($data['telepon_kantor_kerja']) && !empty($data['tempat_lahir'])) {
                $result = $this->SuratMasuk_model->tambah_surat_aktif_organisasi($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                    redirect('adminor/surat_aktif_organisasi');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan surat. Silakan coba lagi.</div>');
                }
            }
        }

        $data['title'] = 'Tambah Surat Aktif Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_organisasi/tambah_surat_aktif_organisasi', $data);
        $this->load->view('templates/footer');
        // Load data surat_masuk from the backend
    }

    public function lihat_data_anggota_organisasi($id)
    {

        $data['title'] = 'Tambah Surat Aktif Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_aktif_organisasi'] = $this->SuratMasuk_model->data_aktif_organisasi_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_organisasi/lihat_data_anggota_organisasi', $data);
        $this->load->view('templates/footer');
        // Load data surat_masuk from the backend
    }

    public function hapus_data_surat_organisasi($id_aktif)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_aktif) && is_numeric($id_aktif)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('SuratMasuk_model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->SuratMasuk_model->hapus_data_surat_organisasi($id_aktif);

            if ($result) {
                // Redirect atau tampilkan pesan sukses jika data berhasil dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            } else {
                // Tampilkan pesan error jika data tidak dapat dihapus
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data!</div>');
            }
            redirect('adminor/surat_aktif_organisasi'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
        } else {
            // Tampilkan pesan error jika parameter ID tidak valid
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID tidak Valid!!</div>');
        }
    }
}
