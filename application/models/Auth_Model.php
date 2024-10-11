<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{

    public function login_by_username($username, $password)
    {
        $hashed_password = md5($password);
        $this->db->where('username', $username);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    public function login_by_email($email, $password)
    {
        $hashed_password = md5($password);
        $this->db->where('email', $email);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('admin');
        return $query->row_array();
    }

    public function check_identity($identity)
    {
        $this->db->where('username', $identity);
        $this->db->or_where('email', $identity);
        $query = $this->db->get('admin');
        return $query->row_array();
    }
}

