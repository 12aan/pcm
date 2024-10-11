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
}
