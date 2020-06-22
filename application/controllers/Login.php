<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['title'] = 'Halaman Login';
        $this->load->view('templates/login_header', $data);
        $this->load->view('registrasi/login');
        $this->load->view('templates/login_footer');
    }
    public function login()
    {
        $user = [];
        $name = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->input->post('pilih') == 'desa') {
            $user = $this->db->get_where('desa', ['username' => $name])->row_array();
        } elseif ($this->input->post('pilih') == 'dusun') {
            $user = $this->db->get_where('dusun', ['username' => $name])->row_array();
        }

        if ($name == $user['username'] && password_verify($password, $user['password'])) {
            if ($this->input->post('pilih') == 'desa') {
                redirect('desa');
            } elseif ($this->input->post('pilih') == 'dusun') {
                redirect('dusun');
            }
        } else {
            redirect('login');
        }
    }

    public function registrasi()
    {
        $data['title'] = 'Halaman Login';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password too short'
        ]);
        $this->Login_model->tambahDataUser();
        $this->load->view('templates/login_header', $data);
        $this->load->view('registrasi/registrasi');
        $this->load->view('templates/login_footer');
    }
}