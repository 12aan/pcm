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


    // public function data_admin_by_id($id_admin)
    // {
    //     $this->db->where('id_admin', $id_admin);
    //     return $this->db->get('admin')->row_array();
    // }

    // // Method untuk memperbarui data admin berdasarkan ID
    // public function edit_data_admin($id_admin, $data)
    // {
    //     $this->db->where('id_admin', $id_admin);
    //     $this->db->update('admin', $data);
    // }
    // public function check_existing_user($username, $email)
    // {
    //     $this->db->where('username', $username);
    //     $this->db->or_where('email', $email);
    //     $query = $this->db->get('admin');
    //     return $query->num_rows() > 0;
    // }
    // public function check_existing_username($username, $current_user_id)
    // {
    //     $this->db->where('username', $username);
    //     $this->db->where('id_admin !=', $current_user_id);
    //     $query = $this->db->get('admin');
    //     return $query->num_rows() > 0;
    // }

    // public function check_existing_email($email, $current_user_id)
    // {
    //     $this->db->where('email', $email);
    //     $this->db->where('id_admin !=', $current_user_id);
    //     $query = $this->db->get('admin');
    //     return $query->num_rows() > 0;
    // }

    // public function check_existing_user_except_current($username, $email, $current_user_id)
    // {
    //     $this->db->where('(username = "' . $username . '" OR email = "' . $email . '") AND id_admin != ' . $current_user_id);
    //     $query = $this->db->get('admin');
    //     return $query->num_rows() > 0;
    // }

    // Mengambil admin berdasarkan ID
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
