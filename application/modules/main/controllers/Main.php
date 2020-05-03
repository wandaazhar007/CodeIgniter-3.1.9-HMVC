<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Main extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('v_login');
    }

    function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'  => 'Email wajib diisi!',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required'  => 'password wajib diisi!',
            'min_length' => 'password terlalu singkat!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Login User';
            $this->load->view('v_login', $data);
        } else {
            //validation success
            $this->prosesLogin();
        }
    }

    private function prosesLogin()
    {
        $email      = htmlspecialchars($this->input->post('email'), true);
        $password   = htmlspecialchars($this->input->post('password'), true);

        $user       = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            //usernya aktif
            if ($user['is_active'] == 1) {
                //aktifkan
                if (password_verify($password, $user['password'])) {
                    //cek password
                    $data = [
                        'id'        => $user['id'],
                        'email'     => $user['email'],
                        'name'      => $user['name'],
                        'image'     => $user['image'],
                        'is_active' => $user['is_active'],
                        'role_id'   => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    }
                    if ($user['role_id'] == 2) {
                        redirect('dashboard');
                    }
                } else {
                    //password dan email tidak sama dengan database
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                        Maaf, Password salah!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        ');
                    redirect('main');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                    Maaf! Email sudah tidak aktif! <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    ');
                redirect('main');
            }
        } else {
            //usernya tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                Maaf! Email belum terdaftar!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                ');
            redirect('main');
        }
    }

    function register()
    {
        $data['title']  = 'Register User';
        $this->load->view('v_register', $data);
    }

    function saveRegister()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required'  => 'password wajib diisi!',
            'matches'   => 'password tidak sama!',
            'min_length' => 'password terlalu singkat!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required'  => 'password wajib diisi!',
            'matches'   => 'password tidak sama!',
            'min_length' => 'password terlalu singkat!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title']  = 'Register User';
            $this->load->view('v_register', $data);
        } else {
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 1,
                'date_created'  => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                Selamat! Registrasi Anda berhasil! <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                ');
            redirect('main');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            Terimakasih, Kamu berhasil logout <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            ');
        redirect('main');
    }
}
