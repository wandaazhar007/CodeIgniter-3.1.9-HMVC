<?php (defined('BASEPATH')) or exit('No direct script access allowed');
class M_produk extends CI_Model
{
    function datatables_getDataProduk()
    {
        $column_order   = ['idproduct', 'name'];
        $column_search  = ['idproduct', 'name'];
        $def_order      = ['idproduct' => 'asc'];

        $this->sql_produk();
        $this->query_datatables($column_order, $column_search, $def_order);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function sql_produk()
    {
        $this->db->select("idproduct,name,price,stock,expired_date", false)
            ->from("product");
    }

    function query_datatables($column_order, $column_search, $def_order)
    {
        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $def_order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_all_produk()
    {
        $this->sql_produk();
        return $this->db->count_all_results();
    }

    function count_filtered_produk()
    {
        $column_order       = ['idproduct', 'name'];
        $column_search      = ['idproduct', 'name'];
        $def_order          = ['idproduct' => 'asc'];

        $this->sql_produk();
        $this->query_datatables($column_order, $column_search, $def_order);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
