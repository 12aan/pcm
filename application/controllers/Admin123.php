<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('SuratMasuk_model');
        $this->load->model('Data_Admin');
        $this->load->model('Statistics_Model'); // Load model statistik
    }

    public function user()
    {
        // Load data surat_masuk from the backend
        $data['surat_keluar'] = $this->SuratMasuk_model->get_surat_keluar(); // Gantilah dengan fungsi sesuai kebutuhan
        $this->load->view('templates/navbar');
        $this->load->view('adminor/surat_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function admin()
    {
        $data['surat_masuk'] = $this->SuratMasuk_model->get_surat_masuk();
        $data['total_visitors'] = $this->Statistics_Model->get_total_visitors(); // Ambil total pengunjung
        $data['total_comments'] = $this->Statistics_Model->get_total_comments(); // Ambil total komentar
        $this->load->view('templates/head');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/dash_admin', $data);
        $this->load->view('templates/admin_footer');
    }

    public function data_admin()
    {
        $data['admin'] = $this->Data_Admin->get_surat_masuk();
        $this->load->view('templates/head');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/admin', $data);
        $this->load->view('templates/admin_footer');
    }

    // Controller Admin
    public function tambah_admin()
    {
        // Jika form tambah admin disubmit
        if ($this->input->post()) {
            // Validasi form
            $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]', [
                'is_unique' => 'Email sudah tersedia.'
            ]);
            $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]', [
                'is_unique' => 'Username sudah ada.'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/]', [
                'regex_match' => 'Password harus mengandung setidaknya satu huruf/angka besar, satu huruf kecil, dan panjang minimal 8 karakter.'
            ]);
            $this->form_validation->set_rules('konfirmasiPassword', 'Konfirmasi Password', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                // Jika ada kesalahan validasi, tampilkan kembali form tambah admin dengan pesan kesalahan
                $this->session->set_flashdata('error', validation_errors());

                $this->load->view('templates/head');
                $this->load->view('templates/admin_sidebar');
                $this->load->view('templates/admin_navbar');
                $this->load->view('admin/tambah_admin');
                $this->load->view('templates/admin_footer');
            } else {
                // Mengambil data dari form
                $password = md5($this->input->post('password')); // Menggunakan MD5 untuk mengenkripsi password

                $data = array(
                    'nama_admin' => $this->input->post('nama_admin'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'no_hp' => $this->input->post('no_hp'),
                    'username' => $this->input->post('username'),
                    'password' => $password, // Gunakan password yang telah dienkripsi
                    'avatar' => $this->uploadAvatar() // Upload avatar
                );

                // Menambahkan data admin ke database
                $this->Data_Admin->tambah_admin($data);

                $this->session->set_flashdata('success', 'Berhasil Menambahkan Data.');
                // Redirect ke halaman data admin
                redirect('admin/data_admin');
            }
        } else {
            // Mengambil data admin
            $data['admin'] = $this->Data_Admin->get_surat_masuk();

            // Memuat view untuk menampilkan form tambah admin
            $this->load->view('templates/head');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_navbar');
            $this->load->view('admin/tambah_admin', $data); // Memuat form tambah admin dengan data admin
            $this->load->view('templates/admin_footer');
        }
    }


    // Method untuk mengupload avatar
    private function uploadAvatar()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            // Handle error if upload fails
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_admin');
        }
    }

    public function edit_data_admin($id_admin)
    {
        // Mengambil data admin berdasarkan ID
        $data['admin'] = $this->Data_Admin->data_admin_by_id($id_admin);

        // Jika data admin tidak ditemukan, tampilkan halaman 404
        if (empty($data['admin'])) {
            show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
        }

        // Memuat view untuk menampilkan form edit admin
        $this->load->view('templates/head');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_navbar');
        $this->load->view('admin/edit_data_admin', $data); // Memuat form edit admin dengan data admin
        $this->load->view('templates/admin_footer');

        // Jika form edit admin disubmit
        if ($this->input->post()) {
            // Mengambil data dari form
            $new_username = $this->input->post('username');
            $new_email = $this->input->post('email');
            $password = $this->input->post('password');
            $konfirmasiPassword = $this->input->post('konfirmasiPassword');
            $gantiPassword = $this->input->post('gantiPassword');
            $gantiAvatar = $this->input->post('gantiAvatar');

            // Validasi konfirmasi password jika admin memilih untuk mengubah password
            if ($gantiPassword == '1' && $password != $konfirmasiPassword) {
                // Tampilkan pesan kesalahan jika password tidak sama dengan konfirmasi password
                $this->session->set_flashdata('error', 'Konfirmasi password tidak sama dengan password.');
                redirect('admin/edit_data_admin/' . $id_admin);
            }

            // Validasi password memiliki minimal 8 karakter dan setidaknya satu huruf besar
            if ($gantiPassword == '1' && (strlen($password) < 8 || !preg_match('/[A-Z]/', $password))) {
                // Tampilkan pesan kesalahan jika password tidak memenuhi syarat
                $this->session->set_flashdata('error', 'Password harus memiliki minimal 8 karakter dan setidaknya satu huruf besar.');
                redirect('admin/edit_data_admin/' . $id_admin);
            }

            // Memeriksa apakah data yang dimasukkan sama dengan data yang sudah ada pada database
            if ($new_username != $data['admin']['username']) {
                // Memeriksa apakah username sudah ada dalam database untuk pengguna lain
                $existing_username = $this->Data_Admin->check_existing_username($new_username, $id_admin);
                if ($existing_username) {
                    // Tampilkan pesan kesalahan jika username sudah ada dalam database untuk pengguna lain
                    $this->session->set_flashdata('error', 'Username sudah digunakan oleh pengguna lain.');
                    redirect('admin/edit_data_admin/' . $id_admin);
                }
            }

            if ($new_email != $data['admin']['email']) {
                // Memeriksa apakah email sudah ada dalam database untuk pengguna lain
                $existing_email = $this->Data_Admin->check_existing_email($new_email, $id_admin);
                if ($existing_email) {
                    // Tampilkan pesan kesalahan jika email sudah ada dalam database untuk pengguna lain
                    $this->session->set_flashdata('error', 'Email sudah digunakan oleh pengguna lain.');
                    redirect('admin/edit_data_admin/' . $id_admin);
                }
            }


            // Mengatur nilai password sesuai dengan pilihan admin
            if ($gantiPassword == '1') {
                $password = md5($password); // Menggunakan MD5 untuk mengenkripsi password
            } else {
                $password = $data['admin']['password']; // Gunakan password lama jika tidak mengganti password
            }

            // Mengatur nilai avatar sesuai dengan pilihan admin
            if (!empty($_FILES['gambar']['name'])) {
                // Jika ada pengunggahan gambar baru
                $avatar = $this->uploadAvatar1(); // Upload avatar baru
            } else {
                // Gunakan avatar lama jika tidak ada pengunggahan gambar baru
                $avatar = $data['admin']['avatar'];
            }

            $data = array(
                'nama_admin' => $this->input->post('nama_admin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'email' => $new_email,
                'no_hp' => $this->input->post('no_hp'),
                'username' => $new_username,
                'password' => $password,
                'avatar' => $avatar
            );

            // Memperbarui data admin ke database
            $this->Data_Admin->edit_data_admin($id_admin, $data);

            // Set notifikasi bahwa edit berhasil
            $this->session->set_flashdata('success', 'Edit admin berhasil.');

            // Redirect ke halaman data admin
            redirect('admin/data_admin');
        }
    }

    private function uploadAvatar1()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            // Handle error if upload fails
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/data_admin');
        }
    }
    
    public function hapus_admin($id_admin)
    {
        if (!empty($id_admin) && is_numeric($id_admin)) {
            $this->load->model('Data_Admin');
            // panggil fungsi model berdasarkan id
            $result = $this->Data_Admin->hapus_admin($id_admin);

            if ($result) {
                redirect('admin/data_admin');
            } else {
                echo 'Gagal menghapus data';
            }
        } else {
            echo 'ID Tidak Valid';
        }
    }
}
