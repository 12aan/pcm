<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistics_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Mendapatkan total pengunjung
    public function get_total_visitors()
    {
        return $this->db->count_all('visit');
    }

    // Mendapatkan total komentar
    public function get_total_comments()
    {
        return $this->db->count_all('comment');
    }
}
