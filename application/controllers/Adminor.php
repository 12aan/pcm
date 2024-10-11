<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title'] = 'Tambah Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasuk_model->get_surat_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/tambah_surat_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_masuk_agenda()
    {
        $data['title'] = 'Tambah Surat Masuk Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasuk_model->get_surat_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/tambah_surat_masuk_agenda', $data);
        $this->load->view('templates/footer');
    }

    public function edit_surat_masuk()
    {
        $data['title'] = 'Tambah Surat Masuk Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->SuratMasuk_model->get_surat_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_masuk/edit_surat_masuk', $data);
        $this->load->view('templates/footer');
    }


    // START SURAT KELUAR UNTUK USER
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
        $this->load->view('templates/navbar');
        $this->load->view('adminor/surat_keluar', $data); // Ubah nama view dengan halaman user Anda
        $this->load->view('templates/footer');
    }
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

        $data['title'] = 'Tambah Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->SuratMasuk_model->get_surat_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/tambah_surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_keluar_agenda()
    {

        $data['title'] = 'Tambah Surat Keluar Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->SuratMasuk_model->get_surat_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/tambah_surat_keluar_agenda', $data);
        $this->load->view('templates/footer');
    }

    public function edit_surat_keluar()
    {

        $data['title'] = 'Edit Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->SuratMasuk_model->get_surat_keluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keluar/edit_surat_keluar', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('templates/navbar');
        $this->load->view('adminor/surat_keputusan', $data); // Ubah nama view dengan halaman user Anda
        $this->load->view('templates/footer');
    }

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
        $data['title'] = 'Tambah Surat Keputusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/tambah_surat_keputusan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_keputusan_agenda()
    {
        $data['title'] = 'Tambah Surat Keputusan Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/tambah_surat_keputusan_agenda', $data);
        $this->load->view('templates/footer');
    }

    public function edit_surat_keputusan()
    {
        $data['title'] = 'Edit Surat Keputusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keputusan'] = $this->SuratMasuk_model->get_surat_keputusan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_keputusan/edit_surat_keputusan', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('templates/navbar');
        $this->load->view('adminor/notulensi', $data); // Ubah nama view dengan halaman user Anda
        $this->load->view('templates/footer');
    }


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

    public function tambah_notulensi()
    {

        $data['title'] = 'Tambah Notulensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notulensi'] = $this->SuratMasuk_model->get_surat_notulensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/tambah_notulensi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_notulensi_agenda()
    {

        $data['title'] = 'Tambah Notulensi Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notulensi'] = $this->SuratMasuk_model->get_surat_notulensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/tambah_notulensi_agenda', $data);
        $this->load->view('templates/footer');
    }


    public function edit_notulensi()
    {

        $data['title'] = 'Edit Notulensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notulensi'] = $this->SuratMasuk_model->get_surat_notulensi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/notulensi/edit_notulensi', $data);
        $this->load->view('templates/footer');
    }


    // START DAFTAR DAN SERTIFIKAT WAKAF UNTUK USER
    public function daftar_sertifikat_wakaf()
    {
        // Load data surat_masuk from the backend
        $data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('adminor/daftar_sertifikat_wakaf', $data);
        $this->load->view('templates/footer');
    }

    //UNTUK ADMIN
    public function wakaf()
    {

        $data['title'] = 'Daftar Dan Sertifikat Wakaf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_wakaf/daftar_sertifikat_wakaf', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat_wakaf()
    {

        $data['title'] = 'Tambah Surat Wakaf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_wakaf/tambah_surat_wakaf', $data);
        $this->load->view('templates/footer');
    }

    public function edit_surat_wakaf()
    {

        $data['title'] = 'Edit Surat Wakaf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat_wakaf'] = $this->SuratMasuk_model->get_surat_wakaf();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/surat_wakaf/edit_surat_wakaf', $data);
        $this->load->view('templates/footer');
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

        $data['title'] = 'Tambah Surat Aktif Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_aktif_organisasi'] = $this->SuratMasuk_model->get_surat_aktif_organisasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/tambah_surat_aktif_organisasi', $data);
        $this->load->view('templates/footer');
        // Load data surat_masuk from the backend
    }

    public function lihat_data_anggota_organisasi()
    {

        $data['title'] = 'Tambah Surat Aktif Organisasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_aktif_organisasi'] = $this->SuratMasuk_model->get_surat_aktif_organisasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/adminor/lihat_data_anggota_organisasi', $data);
        $this->load->view('templates/footer');
        // Load data surat_masuk from the backend
    }
}
