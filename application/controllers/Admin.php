    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Admin extends CI_Controller
    {

        public function __construct()
        {

            parent::__construct();
            is_logged_in();


            // Cek apakah pengguna aktif
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if (!$user || !$user['is_active']) {
                redirect('auth/blocked'); // Redirect ke halaman blocked jika tidak ada atau tidak aktif
            }

            $this->load->model('Data_Admin');
        }



        public function index()
        {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }


        public function role()
        {
            $data['title'] = 'Role';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['role'] = $this->db->get('user_role')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        }


        public function roleAccess($role_id)
        {
            $data['title'] = 'Role Access';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

            $this->db->where('id !=', 1);
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role-access', $data);
            $this->load->view('templates/footer');
        }


        public function changeAccess()
        {
            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');

            $data = [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ];

            $result = $this->db->get_where('user_access_menu', $data);

            if ($result->num_rows() < 1) {
                $this->db->insert('user_access_menu', $data);
            } else {
                $this->db->delete('user_access_menu', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
        }



        public function data_admin()
        {
            $data['title'] = 'Data Admin';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); // User yang sedang login
            $data['admins'] = $this->Data_Admin->get_all_admins(); // Mengambil semua data admin dari model

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data_admin/data_admin', $data); // Menampilkan data admin
            $this->load->view('templates/footer');
        }


        public function tambah_data_admin()
        {
            $data['title'] = 'Tambah Data Admin';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['roles'] = $this->Data_Admin->getRoles();

            // Validasi input form
            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                'is_unique' => 'Email sudah terdaftar!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirm_password]', [
                'matches' => 'Password tidak cocok!',
                'min_length' => 'Password minimal 6 karakter!'
            ]);
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|matches[password]');

            if ($this->form_validation->run() == false) {
                // Jika validasi gagal
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/data_admin/tambah_data_admin', $data);
                $this->load->view('templates/footer');
            } else {
                $image = 'default.jpg'; // Set default image

                // Cek jika ada gambar yang akan diupload
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets12/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['file_name'] = $upload_image; // Gunakan nama file yang sama

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        // Hapus file lama dengan nama yang sama, jika ada
                        $existing_image_path = './assets12/img/profile/' . $upload_image;
                        if (file_exists($existing_image_path)) {
                            unlink($existing_image_path); // Hapus file lama
                        }

                        // Ambil nama file baru
                        $image = $this->upload->data('file_name'); // Simpan nama file baru
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/tambah_data_admin');
                    }
                }

                // Siapkan data untuk disimpan
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => $image, // Gunakan gambar yang diupload atau default
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_admin'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0,
                    'date_created' => time()
                ];

                // Simpan data ke database
                $this->Data_Admin->tambah_data_admin($data);

                // Flashdata untuk notifikasi
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data admin baru berhasil ditambahkan!</div>');
                redirect('admin/data_admin');
            }
        }


        public function edit_data_admin($id = null)
        {
            // Judul halaman
            $data['title'] = 'Edit Data Admin';

            // Ambil data admin yang sedang login
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            // Ambil ID admin yang ingin diubah
            $admin_id = $id ? $id : $this->session->userdata('admin_id');

            // Ambil data admin berdasarkan ID
            $data['admin'] = $this->db->get_where('user', ['id' => $admin_id])->row_array();

            // Ambil data roles dari model untuk ditampilkan di dropdown role
            $data['roles'] = $this->Data_Admin->getRoles();

            // Form validation untuk nama, email, dan lainnya
            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            // Jika validasi form gagal
            if ($this->form_validation->run() == false) {
                // Load view form edit data admin
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/data_admin/edit_data_admin', $data);
                $this->load->view('templates/footer');
            } else {
                // Data yang akan diupdate
                $update_data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'role_id' => $this->input->post('role_admin'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                // Cek apakah admin ingin mengganti password
                if ($this->input->post('gantiPassword')) {
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
                    if ($this->form_validation->run()) {
                        $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    }
                }

                // Cek apakah ada gambar yang di-upload
                if (!empty($_FILES['image']['name'])) {
                    $upload_image = $_FILES['image']['name'];
                    $config['upload_path'] = './assets12/img/profile/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['file_name'] = $upload_image; // Gunakan nama file yang sama

                    $this->load->library('upload', $config);

                    // Cek apakah file dengan nama yang sama sudah ada
                    if (file_exists(FCPATH . 'assets12/img/profile/' . $upload_image)) {
                        // Hapus file lama dengan nama yang sama
                        unlink(FCPATH . 'assets12/img/profile/' . $upload_image);
                    }

                    if ($this->upload->do_upload('image')) {
                        // Hapus gambar lama jika ada
                        $old_image = $data['admin']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets12/img/profile/' . $old_image);
                        }

                        // Simpan gambar baru
                        $update_data['image'] = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors(); // Tampilkan error upload jika gagal
                    }
                }

                // Update data admin melalui model
                $this->Data_Admin->update_admin($admin_id, $update_data);

                // Set pesan flashdata untuk menandakan sukses
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin berhasil diupdate!</div>');

                // Redirect kembali ke halaman admin
                redirect('admin/data_admin');
            }
        }




        public function hapus_admin($id)
        {
            // Cek apakah ID ada di dalam database
            $admin = $this->Data_Admin->getAdminById($id);

            if ($admin) {
                // Jika admin ditemukan, hapus data
                $this->Data_Admin->hapus_admin($id);

                // Cek apakah admin yang dihapus adalah pengguna yang sedang login
                if ($admin['email'] === $this->session->userdata('email')) {
                    // Hapus session dan redirect ke halaman blocked
                    $this->session->sess_destroy(); // Menghancurkan session
                    redirect('auth/blocked'); // Redirect ke halaman blocked
                }

                // Flashdata untuk notifikasi
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data admin berhasil dihapus!</div>');
            } else {
                // Jika admin tidak ditemukan
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data admin tidak ditemukan!</div>');
            }

            // Redirect ke halaman daftar admin
            redirect('admin/data_admin');
        }
    }
