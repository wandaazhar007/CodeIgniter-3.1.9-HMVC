<?php defined('BASEPATH') or exit('No direct script access allowed');
class Wanlibs
{

    function __construct()
    {
        $CI = &get_instance();
        $this->db = $CI->load->database('default', TRUE);
    }

    public function getJabatan()
    {
        $jabatan = $this->session->userdata('role_id');
        if ($jabatan == 1) {
            $jabatan = "Administrator";
        }
        if ($jabatan == 2) {
            $jabatan = "User";
        }
        return $jabatan;
    }

    public function getName()
    {
        $name = $this->session->userdata('role_id');
        return $name;
    }
}
