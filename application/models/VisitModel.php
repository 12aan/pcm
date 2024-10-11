<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VisitModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function record_visit()
    {
        $data = array(
            'date_visit' => date('Y-m-d H:i:s')
        );
        $this->db->insert('visit', $data);
    }
}
