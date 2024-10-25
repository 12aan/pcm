<?php
class Profile_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_profile()
    {
        $this->db->order_by('tanggal_upload', 'DESC'); // Mengambil data dengan urutan terbaru
        return $this->db->get('profile')->result_array(); // Mengambil semua data dari tabel profil
    }

    public function tambah_data_profile($data)
    {
        $this->db->insert('profile', $data); // Sesuaikan dengan nama tabel Anda
    }

    public function upload_profile($data)
    {
        $this->db->insert('profile', $data);
        return $this->db->insert_id();
    }
    public function get_profile_by_id($id)
    {
        return $this->db->get_where('profile', ['id_profile' => $id])->row_array();
    }

    public function update_profile($id, $data)
    {
        $this->db->where('id_profile', $id);
        $this->db->update('profile', $data);
    }

    public function delete_profile($id)
    {
        $this->db->where('id_profile', $id);
        $this->db->delete('profile');
    }


    public function get_artikel()
    {
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get('artikel')->result_array();
    }
    public function get_latest_artikel()
    {
        return $this->db->order_by('date_created', 'DESC')
            ->limit(1)
            ->get('artikel')
            ->row_array();
    }
    public function get_artikel_by_id($id_artikel)
    {
        return $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row_array();
    }


    public function get_kajian_hadist()
    {
        return $this->db->order_by('date_created', 'DESC')->get('Kajian_hadist')->result_array();
    }
    public function get_latest_kajian_hadist()
    {
        return $this->db->order_by('date_created', 'DESC')
            ->limit(1)
            ->get('Kajian_hadist')
            ->row_array();
    }
    public function get_kajian_by_id($id_kajian)
    {
        return $this->db->get_where('Kajian_hadist', ['id_kajian' => $id_kajian])->row_array();
    }
    public function hapus_data_kajian($id_kajian)
    {
        $this->db->where('id_kajian', $id_kajian);
        return $this->db->delete('Kajian_hadist'); // Ganti dengan nama tabel Anda
    }
}
