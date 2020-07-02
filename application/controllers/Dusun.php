<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Dusun extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';

        $this->load->view("templates/template", $data);
        $this->load->view("templates/footer");
    }
    public function Usulan()
    {
        $data['title'] = 'Halaman Usulan';
        $data['usulan'] = $this->Data_model->getUsulan();
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        // var_dump($data['usulan']);
        // die;

        $this->load->view('ext/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_usulan', $data);
        $this->load->view('ext/footer');
    }
    public function tambahUsulan()
    {
        $idrek = $this->input->post('idrekening');
        $subrek = $this->input->post('sub');
        $usulan = $this->input->post('usulan');
        $unit = $this->input->post('unit');
        $panjang = $this->input->post('panjang');
        $lebar = $this->input->post('lebar');
        $tinggi = $this->input->post('tinggi');
        $m3 = $this->input->post('m3');
        $anggaran = $this->input->post('anggaran');
        $subT = $this->input->post('total');

        $objek = array(
            'id_bidang' => $idrek,
            'Id_sub_bidang' => $subrek,
            'usulan' => $usulan,
            'unit' => $unit,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'tinggi' => $tinggi,
            'm3' => $m3,
            'anggaran' => $anggaran,
            'total' => $subT,
            'status' => "Belum disetujui"
        );
        $this->Data_model->createUsulan($objek);
        redirect('Dusun/Usulan', 'refresh');
    }
}