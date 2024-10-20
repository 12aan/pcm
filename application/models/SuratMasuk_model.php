<?php
class SuratMasuk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    // START SURAT MASUK 
    public function get_agenda_list_surat_masuk()
    {
        // Ambil data agenda dari database
        $query = $this->db->get('surat_masuk'); // Mengambil data dari tabel 'agenda'

        // Periksa apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }

    public function get_surat_masuk()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('surat_masuk')->result_array();
    }
    
    public function tambah_surat($data)
    {
        return $this->db->insert('surat_masuk', $data);
    }
    public function get_data_by_id($id_masuk)
    {
        $this->db->where('id_masuk', $id_masuk);
        $query = $this->db->get('surat_masuk');

        return $query->row_array();
    }
    public function edit_data_surat_masuk($id_masuk, $surat_masuk)
    {
        // Perbarui data surat masuk termasuk tanggal
        $surat_masuk['tanggal'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_masuk', $id_masuk);
        $this->db->update('surat_masuk', $surat_masuk);
    }
    public function update_file_path($id_masuk, $new_file_path, $old_avatar)
    {
        // Jika ada file avatar baru yang diunggah, simpan file avatar baru dan perbarui nama file di database
        if (!empty($new_file_path)) {
            // Hapus file avatar lama jika ada
            if (!empty($old_avatar)) {
                unlink('./uploads/' . $old_avatar);
            }
            // Simpan file avatar baru
            $data = array(
                'file_path' => basename($new_file_path),
            );
            // Perbarui nama file avatar di database
            $this->db->where('id_masuk', $id_masuk);
            $this->db->update('surat_masuk', $data);
        }
    }
    public function hapus_data($id_masuk)
    {
        $this->db->where('id_masuk', $id_masuk);
        $this->db->delete('surat_masuk');
        return $this->db->affected_rows() > 0;
    }
    // END SURAT MASUK







    // START SURAT KELUAR
    // START SURAT MASUK 
    public function get_agenda_list_surat_keluar()
    {
        // Ambil data agenda dari database
        $query = $this->db->get('surat_keluar'); // Mengambil data dari tabel 'agenda'

        // Periksa apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }
    public function get_surat_keluar()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('surat_keluar')->result_array();
    }
    public function tambah_surat_keluar($data)
    {
        return $this->db->insert('surat_keluar', $data);
    }
    public function data_out_by_id($id_keluar)
    {
        $this->db->where('id_keluar', $id_keluar);
        $query = $this->db->get('surat_keluar');

        return $query->row_array();
    }
    public function edit_data_surat_keluar($id_keluar, $surat_keluar)
    {
        // Perbarui data surat masuk termasuk tanggal
        $surat_keluar['tanggal'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_keluar', $id_keluar);
        $this->db->update('surat_keluar', $surat_keluar);
    }
    public function hapus_data_keluar($id_keluar)
    {
        // Lakukan query untuk menghapus data dari database berdasarkan ID
        $this->db->where('id_keluar', $id_keluar);
        $this->db->delete('surat_keluar');
        return $this->db->affected_rows() > 0;
    }
    // END SURAT KELUAR





    // START SURAT KEPUTUSAN
    // Di dalam model SuratMasuk_model

    public function get_agenda_list()
    {
        // Ambil data agenda dari database
        $query = $this->db->get('surat_keputusan'); // Mengambil data dari tabel 'agenda'

        // Periksa apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }
    public function get_surat_keputusan()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('surat_keputusan')->result_array();
    }
    public function tambah_surat_keputusan($data)
    {
        return $this->db->insert('surat_keputusan', $data);
    }
    public function data_by_id($id_keputusan)
    {
        $this->db->where('id_keputusan', $id_keputusan);
        $query = $this->db->get('surat_keputusan');

        return $query->row_array();
    }
    public function edit_data_keputusan($id_keputusan, $surat_keputusan)
    {
        // Perbarui data surat masuk termasuk tanggal
        $surat_keputusan['tanggal'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_keputusan', $id_keputusan);
        $this->db->update('surat_keputusan', $surat_keputusan);
    }
    public function update_file_path_keputusan($id_keputusan, $new_file_path, $old_avatar)
    {
        // Jika ada file avatar baru yang diunggah, simpan file avatar baru dan perbarui nama file di database
        if (!empty($new_file_path)) {
            // Hapus file avatar lama jika ada
            if (!empty($old_avatar)) {
                unlink('./uploads/' . $old_avatar);
            }
            // Simpan file avatar baru
            $data = array(
                'file_path' => basename($new_file_path),
            );
            // Perbarui nama file avatar di database
            $this->db->where('id_keputusan', $id_keputusan);
            $this->db->update('surat_keputusan', $data);
        }
    }
    public function hapus_data_keputusan($id_keputusan)
    {
        // Lakukan query untuk menghapus data dari database berdasarkan ID
        $this->db->where('id_keputusan', $id_keputusan);
        $this->db->delete('surat_keputusan');
        return $this->db->affected_rows() > 0;
    }
    // END SURAT KEPUTUSAN



    // start Notulensi
    public function get_agenda_list_surat_notulensi()
    {
        // Ambil data agenda dari database
        $query = $this->db->get('notulensi'); // Mengambil data dari tabel 'agenda'

        // Periksa apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }
    public function get_surat_notulensi()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('notulensi')->result_array();
    }

    public function tambah_surat_notulensi($data)
    {
        return $this->db->insert('notulensi', $data);
    }
    public function data_notulensi_by_id($id_notulensi)
    {
        $this->db->where('id_notulensi', $id_notulensi);
        $query = $this->db->get('notulensi');

        return $query->row_array();
    }
    public function edit_data_surat_notulensi($id_notulensi, $notulensi)
    {
        // Perbarui data surat masuk termasuk tanggal
        $notulensi['tanggal'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_notulensi', $id_notulensi);
        $this->db->update('notulensi', $notulensi);
    }

    public function hapus_data_notulensi($id_notulensi)
    {
        // Lakukan query untuk menghapus data dari database berdasarkan ID
        $this->db->where('id_notulensi', $id_notulensi);
        $this->db->delete('notulensi');
        return $this->db->affected_rows() > 0;
    }
    // End Notulensi


    // START DAFTAR DAN SERTIFIKAT WAKAF 
    public function get_surat_wakaf()
    {
        $this->db->order_by('tanggal', 'DESC'); // Mengurutkan berdasarkan tanggal, dari yang terbaru
        return $this->db->get('sertifikat_wakaf')->result_array();
    }

    public function tambah_surat_wakaf($data)
    {
        return $this->db->insert('sertifikat_wakaf', $data);
    }
    public function data_wakaf_by_id($id_wakaf)
    {
        $this->db->where('id_wakaf', $id_wakaf);
        $query = $this->db->get('sertifikat_wakaf');

        return $query->row_array();
    }
    public function edit_data_wakaf($id_wakaf, $sertifikat_wakaf)
    {
        // Perbarui data surat masuk termasuk tanggal
        $sertifikat_wakaf['tanggal'] = date('Y-m-d H:i:s'); // Perbarui tanggal dengan waktu saat ini
        $this->db->where('id_wakaf', $id_wakaf);
        $this->db->update('sertifikat_wakaf', $sertifikat_wakaf);
    }
    public function update_file_path_wakaf($id_wakaf, $new_file_path, $old_avatar)
    {
        // Jika ada file avatar baru yang diunggah, simpan file avatar baru dan perbarui nama file di database
        if (!empty($new_file_path)) {
            // Hapus file avatar lama jika ada
            if (!empty($old_avatar)) {
                unlink('./uploads/' . $old_avatar);
            }
            // Simpan file avatar baru
            $data = array(
                'file_path_sertifikat_wakaf' => basename($new_file_path),
            );
            // Perbarui nama file avatar di database
            $this->db->where('id_wakaf', $id_wakaf);
            $this->db->update('sertifikat_wakaf', $data);
        }
    }


    public function hapus_data_wakaf($id_wakaf)
    {
        // Lakukan query untuk menghapus data dari database berdasarkan ID
        $this->db->where('id_wakaf', $id_wakaf);
        $this->db->delete('sertifikat_wakaf');
        return $this->db->affected_rows() > 0;
    }
    // END WAKAF


    // Surat Organisasi Keaktifan 
    public function get_surat_aktif_organisasi()
    {
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get('surat_aktif_organisasi')->result_array();
    }
    public function tambah_surat_aktif_organisasi($data)
    {
        $data['tanggal_upload'] = date('Y-m-d H:i:s');
        return $this->db->insert('surat_aktif_organisasi', $data);
    }

    public function data_aktif_organisasi_by_id($id)
    {
        return $this->db->get_where('surat_aktif_organisasi', array('id_aktif' => $id))->row_array();
    }

    public function hapus_data_surat_organisasi($id_aktif)
    {
        // Lakukan query untuk menghapus data dari database berdasarkan ID
        $this->db->where('id_aktif', $id_aktif);
        $this->db->delete('surat_aktif_organisasi');
        return $this->db->affected_rows() > 0;
    }



    // End Surat Keaktifan Organisasi
}
