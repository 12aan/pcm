<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten_Model extends CI_Model
{
    public function get_konten()
    {
        // Mengambil semua data konten
        $this->db->order_by('tanggal_posting', 'DESC');
        $this->db->select('konten.*, kategori.nama_kategori');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        return $this->db->get()->result_array();
    }
    

    public function get_konten_by_id($id)
    {
        // Mengambil data konten berdasarkan ID
        return $this->db->get_where('konten', ['id_konten' => $id])->row_array();
    }
    

    public function tambah_data_konten($konten_data)
    {
        // Insert data konten ke dalam tabel 'konten'
        $this->db->insert('konten', $konten_data);
        // Mengembalikan nilai true jika insert berhasil
        return $this->db->affected_rows() > 0;
    }

    public function edit_data_konten($id_konten, $konten_data)
    {
        // Mengupdate data konten berdasarkan ID
        $this->db->where('id_konten', $id_konten);
        return $this->db->update('konten', $konten_data);
    }

    public function hapus_data($id)
    {
        // Menghapus data konten berdasarkan ID
        $this->db->delete('konten', ['id_konten' => $id]);
    }

    public function get_kategori()
    {
        // Mengambil data kategori
        return $this->db->get('kategori')->result_array();
    }

    public function get_konten_by_kategori($kategori)
    {
        // Menampilkan konten berdasarkan kategori
        $this->db->select('konten.*, kategori.nama_kategori');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('konten.id_kategori', $kategori); // Menambahkan filter berdasarkan kategori
        $this->db->order_by('konten.tanggal_posting', 'DESC');
        return $this->db->get()->result_array();
    }



}
