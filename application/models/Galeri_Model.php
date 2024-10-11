<?php
class Galeri_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_galeri()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('galeri')->result_array();
    }

    public function tambah_data_galeri($data)
    {
        return $this->db->insert('galeri', $data);
    }

    public function get_galeri_by_id($id_galeri)
    {
        $this->db->where('id_galeri', $id_galeri);
        $query = $this->db->get('galeri');

        return $query->row_array();
    }
    public function edit_data_galeri($id_galeri, $galeri)
    {
        // Perbarui data surat masuk termasuk tanggal
        $galeri['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_galeri', $id_galeri);
        $this->db->update('galeri', $galeri);
    }

    public function update_file_path_galeri($id_galeri, $new_file_path, $old_avatar)
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
            $this->db->where('id_galeri', $id_galeri);
            $this->db->update('galeri', $data);
        }
    }

    public function hapus_data_galeri($data)
    {
        $this->db->where('id_galeri', $data);
        $this->db->delete('galeri');
        return $this->db->affected_rows() > 0;
    }
}
