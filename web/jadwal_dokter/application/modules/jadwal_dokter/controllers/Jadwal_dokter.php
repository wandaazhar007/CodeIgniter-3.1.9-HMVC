<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_dokter extends MX_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_jadwal');
  }

  public function index()
  {
    $data['title']     = 'Jadwal Dokter';
    $data['contents']  = 'list_jadwal_dokter';
    $data['jadwal']  = $this->m_jadwal->tampil();

    $this->load->view('templates/core2', $data);
  }

  function detail_dokter($id_dokter)
  {
    $data['title']    = 'Detail Dokter';
    $data['contents']  = 'view_detail_dokter';
    $data['detail']    = $this->m_jadwal->getDetailDokter()->result();

    $this->load->view('templates/core2', $data);
  }

  function get_dokter_result()
  {
    $dokterData = $this->input->post('dokterData');
    if (isset($dokterData) and !empty($dokterData)) {
      $records = $this->m_jadwal->get_search_dokter($dokterData);
      $output = '';

      foreach ($records->result_array() as $row) {
        $output .= '
				
					<div class="row">
						<div class="col-lg profile_details">
              <div class="well profile_view">
                <div class="col-lg">
                    <h4 class="brief"><i>' . $row["poliklinik"] . '</i></h4>
                    <div class="left col-lg">
                      <h2>' . $row["dokter"] . '</h2>
                      <p><strong> ' . $row['poliklinik'] . '</strong></p>
                      <ul class="list-unstyled">
                          <li><i class="fa fa-building"></i> Senin: ' . $row['senin'] . '</li>
                          <li><i class="fa fa-building"></i> Selasa: ' . $row['selasa'] . '</li>
                          <li><i class="fa fa-building"></i> Rabu: ' . $row['rabu'] . '</li>
                          <li><i class="fa fa-building"></i> Kamis: ' . $row['kamis'] . '</li>
                          <li><i class="fa fa-building"></i> Jumat: ' . $row['jumat'] . '</li>
                      </ul>
                    </div>
                    <div class="right col-lg text-center">
                      <img src="' . $row["foto"] . '" alt="" class="img-circle img-responsive">
                    </div>
                </div>
              </div>
            </div>
					</div>
				
				      ';
      }
      echo $output;
    } else {
      echo 'not found';
    }
  }
}
