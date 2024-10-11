<?php
class BreakingNews_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 

    public function get_breaking_news()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('breaking_news')->result_array();
    }

    public function tambah_data_breaking_news($data)
    {
        return $this->db->insert('breaking_news', $data);
    }

    public function get_news_by_id($id_news)
    {
        $this->db->where('id_news', $id_news);
        $query = $this->db->get('breaking_news');

        return $query->row_array();
    }
    public function edit_data_breaking_news($id_news, $breaking_news)
    {
        // Perbarui data surat masuk termasuk tanggal
        $breaking_news['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_news', $id_news);
        $this->db->update('breaking_news', $breaking_news);
    }

    public function update_file_path_breaking_news($id_news, $new_file_path, $old_avatar)
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
            $this->db->where('id_news', $id_news);
            $this->db->update('breaking_news', $data);
        }
    }

    public function hapus_data_breaking_news($data)
    {
        $this->db->where('id_news', $data);
        $this->db->delete('breaking_news');
        return $this->db->affected_rows() > 0;
    }
}
