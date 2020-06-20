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
        $data['title'] = 'Halaman Login';
        $this->load->view('templates/login_header', $data);
        $this->load->view('registrasi/login');
        $this->load->view('templates/login_footer');
    }
    public function registrasi()
    {
        $data['title'] = 'Halaman Login';
        $this->load->view('templates/login_header', $data);
        $this->load->view('registrasi/registrasi');
        $this->load->view('templates/login_footer');
    }
}