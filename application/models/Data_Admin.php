<?php
class Data_Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    // Fungsi untuk mendapatkan semua data admin dari tabel user
    public function get_all_admins()
    {
        return $this->db->get('user')->result_array(); // Mengambil semua data dari tabel user
    }

    public function tambah_data_admin($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getRoles()
    {
        // Mengambil semua data role dari tabel 'user_role'
        return $this->db->get('user_role')->result_array();
    }


    // EDIT DATA ADMIN
    public function update_admin($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function getAdminById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    // Fungsi untuk menghapus admin dari database
    public function hapus_admin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
