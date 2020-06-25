<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class UserDusun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserDusun_model');
    }
    public function index()
    {
        $data['title'] = 'Kelola User Dusun';
        $data['user'] = $this->UserDusun_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kelola user dusun/v_dusun');
        $this->load->view('templates/footer');
    }
    public function hapus($id)
    {
        $this->UserDusun_model->remove($id);
        redirect('UserDusun');
    }
}