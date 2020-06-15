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
        $data['Sub'] = $this->SubBidang_model->getSub();

        $data['title'] = 'Halaman Sub Bidang';

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_SubBidang', $data);
        $this->load->view('Templates/footer');
    }
    public function create()
    {
        $sub = $this->input->post('SubRek');
        $isi = $this->input->post('Nasub');
        $idrek = $this->input->post('idrekening');

        $objek = array(
            'Sub_rek' => $sub,
            'nama_sub_bidang' => $isi,
            'id_bidang' => $idrek
        );
        $this->SubBidang_model->create($objek);
        redirect('Sub_bidang', 'refresh');
    }
    public function hapus($id)
    {
        $this->SubBidang_model->remove($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('Sub_bidang');
    }
    public function edit($id)
    {
        $data['title'] = "Halaman Edit Sub Bidang";
        $data['isi_subB'] = $this->SubBidang_model->get_id($id);
        $data['Sub'] = $this->SubBidang_model->getSub();
        // var_dump($data['isi_subB']);
        // die;
        $this->load->view("Templates/header", $data);
        $this->load->view("Templates/sidebar");
        $this->load->view("Templates/topbar");
        $this->load->view("Input Data/v_edit_sub", $data);
        $this->load->view("Templates/footer");
    }
    public function proses_edit()
    {
        $sub = $this->input->post('SubRek');
        $isi = $this->input->post('Nasub');
        $id_bidang = $this->input->post('id_bidang');
        $id_sub_bidang = $this->input->post('id');
        $objek = array(
            'Sub_rek' => $sub,
            'nama_sub_bidang' => $isi,
            'id_bidang' => $id_bidang
        );
        $data['Sub'] = $this->SubBidang_model->getSub();
        $this->SubBidang_model->update($id_sub_bidang, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil diedit');
        redirect('sub_bidang');
    }
}