<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class User extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->library('wanlibs');
    }

    function index()
    {
        $data['title']      = 'User';
        $data['contents']   = 'v_user';
        $this->load->view('templates/core', $data);
    }

    function insertUser() {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]',[
            'required'      => 'Email wajib diisi!',
            'valid_email'   => 'Masukan email yang valid!',
            'is_unique'     => 'Email Sudah Terdaftar!'
            ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required'      => 'password wajib diisi!',
            'matches'       => 'password tidak sama!',
            'min_length'    => 'password terlalu singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required'      => 'password wajib diisi!',
            'matches'       => 'password tidak sama!',
            'min_length'    => 'password terlalu singkat!'
        ]);

        if($this->form_validation->run() == false) {
            $this->input->post('user');
        } else {
            $data = [
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email'), true),
                'image'     => 'default.jpg',
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'   => htmlspecialchars($this->input->post('role_id'), true),
                'is_active' => 1,
                'date_created' => time()
            $this->db->insert('mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> Selamat! Registrasi berhasil! <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
                ');
            redirect('user');
                
            ]
        }
    }
}
