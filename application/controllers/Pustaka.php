<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pustaka extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pustaka_Model');
    }

    public function index()
    {
        // Load data surat_masuk from the backend
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('pustaka', $data);
        $this->load->view('templates/footer');
    }

    // surat masuk admin
    public function pustaka()
    {

        $data['title'] = 'Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pustaka/pustaka', $data);
        $this->load->view('templates/footer'); 

        
    }

    public function tambah_data_pustaka()
    {
        // Check if form is submitted
        if ($this->input->post()) {
            $data = array(
                'judul_pustaka' => $this->input->post('judul_pustaka')
                // Add more fields here if needed
            );

            // Call the model method to insert data
            $this->Pustaka_Model->tambah_data_pustaka($data);

            // Redirect to a success page or do anything else you need
            redirect('pustaka/pustaka'); // Assuming 'pustaka' is your listing page
        }

        // Load views
        $this->load->view('templates/head');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('pustaka/tambah_data_pustaka'); // Load the view to display form
        $this->load->view('templates/admin_footer');
    }


    public function edit_data_pustaka($id_pustaka)
    {

        date_default_timezone_set('Asia/Jakarta');
        
        // Ambil data pustaka berdasarkan ID
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka_by_id($id_pustaka);

        // Jika data tidak ditemukan, redirect atau tampilkan pesan kesalahan
        if (!$data['pustaka']) {
            // Tambahkan logika redirect atau pesan kesalahan
            redirect('pustaka/pustaka'); // Contoh redirect ke halaman pustaka jika data tidak ditemukan
        }

        // Jika form disubmit, proses data
        if ($this->input->post()) {
            // Ambil data dari form
            $judul_pustaka = $this->input->post('judul_pustaka');
            // Perbarui tanggal menjadi tanggal saat ini
            $tanggal_upload = date('Y-m-d H:i:s'); // Menggunakan format TIMESTAMP saat ini

            // Panggil model untuk update data pustaka
            $this->Pustaka_Model->edit_data_pustaka($id_pustaka, $judul_pustaka, $tanggal_upload);

            // Redirect atau tampilkan pesan sukses
            redirect('pustaka/pustaka'); // Contoh redirect ke halaman pustaka setelah berhasil mengedit
        }

        // Load view untuk menampilkan form edit
        $this->load->view('templates/head');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('pustaka/edit_data_pustaka', $data); // Load view edit dengan data pustaka
        $this->load->view('templates/admin_footer');
    }




    public function hapus_data_pustaka($id_pustaka)
    {
        // Pastikan ID tidak kosong dan merupakan angka
        if (!empty($id_pustaka) && is_numeric($id_pustaka)) {
            // Panggil model atau lapisan lain yang berhubungan dengan manipulasi database
            $this->load->model('Pustaka_Model'); // Gantilah 'nama_model' sesuai dengan nama model Anda

            // Panggil fungsi dalam model untuk menghapus data berdasarkan ID
            $result = $this->Pustaka_Model->hapus_data_pustaka($id_pustaka);

            if ($result) {
                // Redirect atau tampilkan pesan sukses jika data berhasil dihapus
                redirect('pustaka/pustaka'); // Gantilah 'daftar_surat_masuk' dengan nama fungsi atau halaman yang sesuai
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
