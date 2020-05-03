<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Produk extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_produk');
    }

    function index()
    {
        $data['title']      = 'List Data Produk';
        $data['contents']   = 'list_produk';
        $data['breadcumb']   = 'list-produk';
        $this->load->view('templates/core', $data);
    }

    function getDataProduk()
    {
        $list = $this->m_produk->datatables_getDataProduk();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value) {
            $row = array();
            $row[] = $value['idproduct'];
            $row[] = $value['name'];
            $row[] = $value['price'];
            $row[] = $value['stock'];
            $row[] = $value['expired'];
            $action = '<a style="color:white;" id="idproduk" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update</a> <a style="color:white" id="idproduk" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete</a>';

            $row[] = $action;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_produk->count_all_produk(),
            "recordsFiltered" => $this->m_produk->count_filtered_produk(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}
