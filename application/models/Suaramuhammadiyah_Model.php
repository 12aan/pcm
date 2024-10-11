<?php
class Suaramuhammadiyah_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_suaramuhammadiyah()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('suara_muhammadiyah')->result_array();
    }

    public function tambah_data_suaramuhammadiyah($data)
    {
        return $this->db->insert('suara_muhammadiyah', $data);
    }

    public function get_suaramuhammadiyah_by_id($id_suara)
    {
        $this->db->where('id_suara', $id_suara);
        $query = $this->db->get('suara_muhammadiyah');

        return $query->row_array();
    }
    public function edit_data_suaramuhammadiyah($id_suara, $suara_muhammadiyah)
    {
        // Perbarui data surat masuk termasuk tanggal
        $suara_muhammadiyah['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_suara', $id_suara);
        $this->db->update('suara_muhammadiyah', $suara_muhammadiyah);
    }

    public function update_file_path_suaramuhammadiyah($id_suara, $new_file_path, $old_avatar)
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
            $this->db->where('id_suara', $id_suara);
            $this->db->update('suara_muhammadiyah', $data);
        }
    }

    public function hapus_data_suaramuhammadiyah($data)
    {
        $this->db->where('id_suara', $data);
        $this->db->delete('suara_muhammadiyah');
        return $this->db->affected_rows() > 0;
    }
}
