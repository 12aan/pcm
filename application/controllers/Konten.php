<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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
        $this->load->model('Konten_Model'); // Memuat model
    }


    public function derita($kategori = null)
    {
        $data['title'] = 'Derita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Jika kategori dipilih, tampilkan konten berdasarkan kategori
        if ($kategori) {
            $data['konten'] = $this->Konten_Model->get_konten_by_kategori($kategori);
        } else {
            // Jika tidak ada kategori yang dipilih, tampilkan semua konten
            $data['konten'] = $this->Konten_Model->get_konten();
        }

        $data['kategori'] = $this->Konten_Model->get_kategori(); // Menambahkan kategori untuk dropdown
        $data['kategori_terpilih'] = $kategori; // Menyimpan kategori yang dipilih


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/derita/derita/derita', $data); // View untuk halaman konten
        $this->load->view('templates/footer');
    }


    public function tambah_data_konten()
    {
        $this->load->library('upload');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|pptx|gif|docx';
        $config['max_size'] = 999999999; // ukuran dalam KB, sesuaikan dengan kebutuhan
        $this->upload->initialize($config);

        // Ambil daftar kategori
        $data['kategori'] = $this->db->get('kategori')->result();

        $konten_data = array(
            'judul' => $this->input->post('judul'),
            'isi_pesan' => $this->input->post('isi_pesan'),
            'id_kategori' => $this->input->post('id_kategori'),
            'gambar' => ''
        );

        // Periksa apakah sebuah file dipilih untuk diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Lakukan unggah jika ada file yang dipilih
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $konten_data['gambar'] = $upload_data['file_name'];
            } else {
                // Tampilkan pesan error jika unggah gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('konten/tambah_data_konten');
            }
        }

        if (!empty($konten_data['judul']) && !empty($konten_data['isi_pesan']) && !empty($konten_data['id_kategori'])) {
            // Insert data konten
            $result = $this->Konten_Model->tambah_data_konten($konten_data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Data</div>');
                redirect('konten/derita');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan konten. Silakan coba lagi.</div>');
            }
        } else {
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
        }

        // Load view untuk form tambah konten
        $data['title'] = 'Tambah Konten';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/derita/derita/tambah_data_konten', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_konten($id_konten)
    {
        $this->load->library('upload');

        // Ambil data konten berdasarkan ID
        $konten = $this->Konten_Model->get_konten_by_id($id_konten);
        if (!$konten) {
            show_error('Konten tidak ditemukan!');
        }

        // Ambil daftar kategori
        $data['kategori'] = $this->db->get('kategori')->result();

        // Proses pengiriman form
        if ($this->input->post()) {
            $current_datetime = date('Y-m-d H:i:s');
            $data_changed = false;

            // Konfigurasi upload file
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx|doc|pptx';
            $config['max_size'] = 999999999; // Ukuran maksimal file
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            // Cek apakah ada file yang diunggah
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    $konten_data['gambar'] = $upload_data['file_name'];
                    $data_changed = true;

                    // Hapus gambar lama jika ada
                    if (!empty($konten['gambar'])) {
                        unlink('./uploads/' . $konten['gambar']);
                    }
                } else {
                    // Tampilkan pesan error jika unggah gagal
                    $error = $this->upload->display_errors();
                    echo $error;
                    return;
                }
            }

            // Ambil data dari form
            $konten_data['judul'] = $this->input->post('judul');
            $konten_data['isi_pesan'] = $this->input->post('isi_pesan');
            $konten_data['id_kategori'] = $this->input->post('id_kategori');
            $konten_data['tanggal_posting'] = $current_datetime;

            // Cek apakah ada perubahan pada data form
            if ($konten['judul'] != $konten_data['judul'] || $konten['isi_pesan'] != $konten_data['isi_pesan'] || $konten['id_kategori'] != $konten_data['id_kategori']) {
                $data_changed = true;
            }

            if ($data_changed) {
                // Update data konten
                $this->Konten_Model->edit_data_konten($id_konten, $konten_data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengedit Data Konten</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Tidak ada perubahan data</div>');
            }

            // Redirect ke halaman konten
            redirect('konten/derita');
        } else {
            // Load data untuk form edit konten
            $data['konten'] = $konten;
            $data['title'] = 'Edit Konten';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/konten/edit_data_konten', $data);
            $this->load->view('templates/footer');
        }
    }


    public function hapus_data_konten($id)
    {
        // Hapus data terkait di tabel komentar terlebih dahulu
        $this->db->where('id_konten', $id);
        $this->db->delete('komentar');

        // Menghapus data konten berdasarkan ID
        $this->Konten_Model->hapus_data($id);

        // Set flashdata untuk pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');

        // Redirect ke halaman yang dituju
        redirect('konten/derita');
    }
}
