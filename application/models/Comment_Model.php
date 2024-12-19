<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_Model extends CI_Model
{

    public function get_komentar_by_konten($id_konten)
    {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('id_konten', $id_konten);
        $this->db->order_by('tanggal_komentar', 'ASC'); // Urutkan berdasarkan tanggal komentar
        return $this->db->get()->result_array();
    }
    
    public function tambah_komentar($data)
    {
        $this->db->insert('komentar', $data);
        return $this->db->insert_id(); // Mengembalikan ID komentar yang baru ditambahkan
    }

}