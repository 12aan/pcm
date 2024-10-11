<?php
class Data_Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_surat_masuk()
    {
        return $this->db->get('admin')->result_array();
    }

    public function tambah_admin($data)
    {
        $this->db->insert('admin', $data);
        return $this->db->insert_id();
    }

    public function data_admin_by_id($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->get('admin')->row_array();
    }

    // Method untuk memperbarui data admin berdasarkan ID
    public function edit_data_admin($id_admin, $data)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }
    public function check_existing_user($username, $email)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        $query = $this->db->get('admin');
        return $query->num_rows() > 0;
    }
    public function check_existing_username($username, $current_user_id)
    {
        $this->db->where('username', $username);
        $this->db->where('id_admin !=', $current_user_id);
        $query = $this->db->get('admin');
        return $query->num_rows() > 0;
    }

    public function check_existing_email($email, $current_user_id)
    {
        $this->db->where('email', $email);
        $this->db->where('id_admin !=', $current_user_id);
        $query = $this->db->get('admin');
        return $query->num_rows() > 0;
    }

    public function check_existing_user_except_current($username, $email, $current_user_id)
    {
        $this->db->where('(username = "' . $username . '" OR email = "' . $email . '") AND id_admin != ' . $current_user_id);
        $query = $this->db->get('admin');
        return $query->num_rows() > 0;
    }

    public function hapus_admin($id_admin) 
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        return $this->db->affected_rows() > 0;
    }
}
