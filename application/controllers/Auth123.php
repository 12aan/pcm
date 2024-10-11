<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('logged_in')) {
        //     redirect('auth/login');
        // }
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        // Jika pengguna sudah login, arahkan ke halaman admin
        if ($this->session->userdata('logged_in')) {
            redirect('admin/admin');
        }

        // Validasi form
        $this->form_validation->set_rules('identity', 'Email/Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');

            // Cek apakah yang dimasukkan adalah email atau username
            if (strpos($identity, '@') !== false) {
                // Login dengan email
                $user = $this->Auth_Model->login_by_email($identity, $password);
            } else {
                // Login dengan username
                $user = $this->Auth_Model->login_by_username($identity, $password);
            }

            if ($user) {
                // Simpan informasi admin ke session
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('admin_id', $user['id_admin']); // Sesuaikan dengan field ID admin di database
                $this->session->set_userdata('admin_name', $user['nama_admin']);
                $this->session->set_userdata('admin_avatar', $user['avatar']); // Sesuaikan dengan field nama admin di database
                redirect('admin/admin');
            } else {
                // Cek apakah identitas yang dimasukkan benar
                $check_identity = $this->Auth_Model->check_identity($identity);
                if (!$check_identity) {
                    $this->session->set_flashdata('error', 'Invalid email/username');
                } else {
                    // Identitas benar, cek apakah password yang dimasukkan benar
                    $this->session->set_flashdata('error', 'Password Incorrect');
                }
                redirect('auth/login');
            }
        }
    }




    public function logout()
    {
        // Unset semua data session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_avatar');

        // Hapus semua data session
        $this->session->sess_destroy();

        redirect('');
    }
}
