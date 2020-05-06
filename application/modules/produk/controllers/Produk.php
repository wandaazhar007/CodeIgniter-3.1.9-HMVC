<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Produk extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_produk');
        $this->load->library('datatables');
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
            $row[] = $value['barcode'];
            $row[] = $value['name'];
            $row[] = $value['price'];
            $row[] = $value['stock'];
            $row[] = $value['expired_date'];
            //$action = '<a style="color:white;" class="btn btn-primary btn-xs view_data" data-toggle="modal" data-target="#exampleModal" id="22"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update</a> <a style="color:white" id="idproduct" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete</a>';
            $action = '<a style="color:white;"data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-xs view_data"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update</a>';
            $row[] = $action;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_produk->count_all_produk(),
            "recordsFiltered" => $this->m_produk->count_filtered_produk(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function json()
    {

        $this->datatables->select('*');
        $this->datatables->from('product');
        return print_r($this->datatables->generate());
    }

    function getDetail()
    {
        $produkData = $this->input->post('detailModal');
        if (isset($produkData) and !empty($produkData)) {
            $records = $this->m_produk->getModalProduk($produkData);
            $output = '';

            foreach ($records->result_array() as $row) {
                $output .= '
              <h1> ' . $row["poliklinik"] . '</h1>
				
				      ';
            }
            echo $output;
        } else {
            echo '<h3 align="center">' . 'Produk Tidak Ditemukan' . '</h3>';
        }
    }

    // <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
    //             Launch Default Modal
    //           </button>
}
