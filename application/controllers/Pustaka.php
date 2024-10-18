<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pustaka extends CI_Controller
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
        $this->load->model('Pustaka_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Load data surat_masuk from the backend
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('user/pustaka/pustaka', $data);
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

    public function tambah_pustaka()
    {
        $data['title'] = 'Tambah Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Form validation rules
        $this->form_validation->set_rules('judul_pustaka', 'Judul Pustaka', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pustaka/tambah_pustaka', $data);
            $this->load->view('templates/footer');
        } else {
            // Preparing data for insertion
            $data = [
                'judul_pustaka' => $this->input->post('judul_pustaka'),
                'tanggal_upload' => date('Y-m-d') // Automatically set the current date
            ];

            // Insert pustaka data
            $this->Pustaka_Model->tambah_data_pustaka($data);

            // Set flash message
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pustaka berhasil ditambahkan!</div>');

            // Redirect to pustaka list
            redirect('pustaka/pustaka');
        }
    }

    public function edit_pustaka($id_pustaka)
    {
        $data['title'] = 'Edit Pustaka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Ambil data pustaka berdasarkan ID
        $data['pustaka'] = $this->Pustaka_Model->get_pustaka_by_id($id_pustaka);

        // Form validation rules
        $this->form_validation->set_rules('judul_pustaka', 'Judul Pustaka', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Tampilkan form edit jika validasi gagal
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pustaka/edit_pustaka', $data);
            $this->load->view('templates/footer');
        } else {
            // Data baru yang diinputkan
            $judul_baru = $this->input->post('judul_pustaka');
            $tanggal_baru = date('Y-m-d', strtotime($this->input->post('tanggal')));

            // Data lama dari database
            $judul_lama = $data['pustaka']['judul_pustaka'];
            // Pastikan tanggal dari database diformat dengan format yang sama
            $tanggal_lama = date('Y-m-d', strtotime($data['pustaka']['tanggal_upload']));

            // Debugging sederhana untuk melihat apa yang terjadi

            // Cek apakah ada perubahan data
            if ($judul_baru == $judul_lama && $tanggal_baru == $tanggal_lama) {
                // Jika tidak ada perubahan
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada perubahan data!</div>');
            } else {
                // Jika ada perubahan, update data pustaka
                $this->Pustaka_Model->edit_data_pustaka($id_pustaka, $judul_baru, $tanggal_baru);

                // Set flash message untuk perubahan berhasil
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pustaka berhasil diperbarui!</div>');
            }

            // Redirect setelah flash message disetel
            redirect('pustaka/pustaka');
        }
    }

    public function hapus_data_pustaka($id_pustaka)
    {
        // Hapus data pustaka berdasarkan ID
        $this->Pustaka_Model->hapus_data_pustaka($id_pustaka);

        // Set flash message
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pustaka berhasil dihapus!</div>');

        // Redirect kembali ke halaman pustaka
        redirect('pustaka/pustaka/');
    }
}
