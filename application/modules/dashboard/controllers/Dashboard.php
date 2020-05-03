<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('wanlibs');

    }
    function index()
    {

        $data['title']      = 'Dashboard';
        $data['breadcumb']  = 'Dashboard';
        $data['jabatan']    = $this->getJabatan();
        $data['nama']       = $this->getNama();
        $data['image']      = $this->getImage();
        $data['contents']   = 'v_dashboard';
        $this->load->view('templates/core', $data);
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

    public function getNama()
    {
        $nama = $this->session->userdata('name');
        return $nama;
    }


    public function getImage()
    {
        $image = $this->session->userdata('image');
        return $image;
    }
}
