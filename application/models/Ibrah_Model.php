<?php
class Ibrah_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_ibrah()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('ibrah')->result_array();
    }

    public function tambah_data_ibrah($data)
    {
        return $this->db->insert('ibrah', $data);
    }

    public function get_ibrah_by_id($id_ibrah)
    {
        $this->db->where('id_ibrah', $id_ibrah);
        $query = $this->db->get('ibrah');

        return $query->row_array();
    }
    public function edit_data_ibrah($id_ibrah, $ibrah)
    {
        // Perbarui data surat masuk termasuk tanggal
        $ibrah['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_ibrah', $id_ibrah);
        $this->db->update('ibrah', $ibrah);
    }

    public function update_file_path_ibrah($id_ibrah, $new_file_path, $old_avatar)
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
            $this->db->where('id_ibrah', $id_ibrah);
            $this->db->update('ibrah', $data);
        }
    }

    public function hapus_data_ibrah($data)
    {
        $this->db->where('id_ibrah', $data);
        $this->db->delete('ibrah');
        return $this->db->affected_rows() > 0;
    }
}
