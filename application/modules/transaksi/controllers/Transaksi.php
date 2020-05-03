<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Transaksi extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['title']      = 'Transaksi';
        $data['breadcumb']      = 'Transaksi';
        $data['contents']   = 'v_transaksi';
        $this->load->view('templates/core', $data);
    }
}
