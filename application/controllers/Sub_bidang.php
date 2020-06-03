<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Sub_bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SubBidang_model');
    }
    function index()
    {
        $data['subBidang'] = $this->SubBidang_model->getAll();
        $data['title'] = 'Halaman Sub Bidang';
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_SubBidang');
        $this->load->view('Templates/footer');
    }
    function create()
    {
        $sub = $this->input->post('Sub_rek');
        $isi = $this->input->post('nama_sub_bidang');

        $objek = array(
            'Sub_rek' => $sub,
            'nama_sub_bidang' => $isi

        );
    }
}