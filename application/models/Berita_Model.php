<?php
class Berita_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_berita()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('berita')->result_array();
    }


    public function tambah_data_berita($data)
    {
        return $this->db->insert('berita', $data);
    }

    public function get_berita_by_id($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $query = $this->db->get('berita');

        return $query->row_array();
    }
    public function edit_data_berita($id_berita, $berita)
    {
        // Perbarui data surat masuk termasuk tanggal
        $berita['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_berita', $id_berita);
        $this->db->update('berita', $berita);
    }

    public function update_file_path_berita($id_berita, $new_file_path, $old_avatar)
    {
        // Jika ada file avatar baru yang diunggah, simpan file avatar baru dan perbarui nama file di database
        if (!empty($new_file_path)) {
            // Hapus file avatar lama jika ada
            if (!empty($old_avatar)) {
                unlink('./uploads/' . $old_avatar);
            }
            // Simpan file avatar baru
            $data = array(
                'avatar' => basename($new_file_path),
            );
            // Perbarui nama file avatar di database
            $this->db->where('id_berita', $id_berita);
            $this->db->update('berita', $data);
        }
    }

    public function hapus_data_berita($data)
    {
        $this->db->where('id_berita', $data);
        $this->db->delete('berita');
        return $this->db->affected_rows() > 0;
    }
}
