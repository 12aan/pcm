<?php
class KabarRanting_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
   
    public function get_kabar_ranting()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('kabar_ranting')->result_array();
    }

    public function tambah_data_kabar_ranting($data)
    {
        return $this->db->insert('kabar_ranting', $data);
    }

    public function get_kabar_ranting_by_id($id_kabar_ranting)
    {
        $this->db->where('id_kabar_ranting', $id_kabar_ranting);
        $query = $this->db->get('kabar_ranting');

        return $query->row_array();
    }
    public function edit_data_kabar_ranting($id_kabar_ranting, $kabar_ranting)
    {
        // Perbarui data surat masuk termasuk tanggal
        $kabar_ranting['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_kabar_ranting', $id_kabar_ranting);
        $this->db->update('kabar_ranting', $kabar_ranting);
    }

    public function update_file_path_kabar_ranting($id_kabar_ranting, $new_file_path, $old_avatar)
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
            $this->db->where('id_kabar_ranting', $id_kabar_ranting);
            $this->db->update('kabar_ranting', $data);
        }
    }

    public function hapus_data_kabar_ranting($data)
    {
        $this->db->where('id_kabar_ranting', $data);
        $this->db->delete('kabar_ranting');
        return $this->db->affected_rows() > 0;
    }
}
