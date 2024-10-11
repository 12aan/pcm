<?php
class Pengumuman_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_pengumuman()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('pengumuman')->result_array();
    }

    public function tambah_data_pengumuman($data)
    {
        return $this->db->insert('pengumuman', $data);
    }

    public function get_pengumuman_by_id($id_pengumuman)
    {
        $this->db->where('id_pengumuman', $id_pengumuman);
        $query = $this->db->get('pengumuman');

        return $query->row_array();
    }
    public function edit_data_pengumuman($id_pengumuman, $pengumuman)
    {
        // Perbarui data surat masuk termasuk tanggal
        $pengumuman['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->update('pengumuman', $pengumuman);
    }

    public function update_file_path_pengumuman($id_pengumuman, $new_file_path, $old_avatar)
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
            $this->db->where('id_pengumuman', $id_pengumuman);
            $this->db->update('pengumuman', $data);
        }
    }

    public function hapus_data_pengumuman($data)
    {
        $this->db->where('id_pengumuman', $data);
        $this->db->delete('pengumuman');
        return $this->db->affected_rows() > 0;
    }
}
