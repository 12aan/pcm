<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        if (empty($role_id)) { // Cek apakah role_id tidak kosong
            redirect('auth/blocked'); // Redirect jika role_id tidak ada
        }

        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        if ($queryMenu) {
            $menu_id = $queryMenu['id'];

            $userAccess = $ci->db->get_where('user_access_menu', [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);

            if ($userAccess->num_rows() < 1) {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth/blocked'); // Redirect jika menu tidak ditemukan
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }


}



