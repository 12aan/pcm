<?php
class Profile_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_profile()
    {
        return $this->db->get('profile')->result_array();
    }

    public function upload_profile($data)
    {
        $this->db->insert('profile', $data);
        return $this->db->insert_id();
    }

    public function get_kajian_hadist()
    {
        return $this->db->order_by('date_created', 'DESC')->get('Kajian_hadist')->result_array();
    }
    public function get_kajian_by_id($id_kajian)
    {
        return $this->db->get_where('Kajian_hadist', ['id_kajian' => $id_kajian])->row_array();
    }

}
