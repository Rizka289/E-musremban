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
        $data['bidang'] = $this->Usulan_model->getBidang();
        $data['subBi'] = $this->Usulan_model->getSub();
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
        $idrek = $this->input->post('idrekening');
        $subrek = $this->input->post('sub');
        $usulan = $this->input->post('usulan');
        $anggaran = $this->input->post('anggaran');

        $objek = array(
            'id_bidang' => $idrek,
            'Id_sub_bidang' => $subrek,
            'usulan' => $usulan,
            'anggaran' => $anggaran
        );
        $this->Usulan_model->create($objek);
        redirect('usulan', 'refresh');
    }
    public function hapus($id)
    {
        $this->Usulan_model->remove($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('usulan');
    }
}