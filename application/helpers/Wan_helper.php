<?php

function cek_login()
{
    get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('main');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
    }
}
