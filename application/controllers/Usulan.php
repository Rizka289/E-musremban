<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Usulan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usulan_model');
    }
    function index()
    {
        $data['title'] = 'Halaman Usulan';
        $data['usulan'] = $this->Usulan_model->getAll();
        // var_dump($data['usulan']);
        // die;

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_usulan', $data);
        $this->load->view('Templates/footer');
    }
    public function create()
    {
    }
}