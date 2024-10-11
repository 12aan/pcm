<?php
class Pustaka_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_pustaka()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('pustaka')->result_array();
    }

    public function tambah_data_pustaka($data)
    {

        $this->db->insert('pustaka', $data);
        return $this->db->insert_id();
    }

    public function get_pustaka_by_id($data)
    {
        return $this->db->get_where('pustaka', array('id_pustaka' => $data))->row_array();
    }


    

    public function edit_data_pustaka($id_pustaka, $judul, $tanggal)
    {
        $data = array(
            'judul_pustaka' => $judul,
            'tanggal_upload' => $tanggal // Mengupdate tanggal di dalam database
            // Tambahkan field lain yang perlu diupdate jika ada
        );

        // Update data pustaka berdasarkan ID
        $this->db->where('id_pustaka', $id_pustaka);
        $this->db->update('pustaka', $data);
    }



    public function hapus_data_pustaka($data)
    {
        $this->db->where('id_pustaka', $data);
        $this->db->delete('pustaka');
        return $this->db->affected_rows() > 0;
    }
}
