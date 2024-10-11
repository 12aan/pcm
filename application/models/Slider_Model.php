<?php
class Slider_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // START SURAT MASUK 
    public function get_slider()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('slider')->result_array();
    }

    public function tambah_data_slider($data)
    {
        return $this->db->insert('slider', $data);
    }

    public function get_slider_by_id($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        $query = $this->db->get('slider');

        return $query->row_array();
    }
    public function edit_data_slider($id_slider, $slider)
    {
        // Perbarui data surat masuk termasuk tanggal
        $slider['tanggal_upload'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_slider', $id_slider);
        $this->db->update('slider', $slider);
    }

    public function update_file_path_slider($id_slider, $new_file_path, $old_avatar)
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
            $this->db->where('id_slider', $id_slider);
            $this->db->update('slider', $data);
        }
    }

    public function hapus_data_slider($data)
    {
        $this->db->where('id_slider', $data);
        $this->db->delete('slider');
        return $this->db->affected_rows() > 0;
    }
}
