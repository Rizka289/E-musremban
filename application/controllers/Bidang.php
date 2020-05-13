<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Bidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_model');
    }
    public function index()
    {
        $data['title'] = 'Halaman Bidang';
        $data['bidang'] = $this->Bidang_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Input Data/v_bidang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $this->Bidang_model->insert();
        redirect('bidang', 'refresh');
    }
    public function hapus($id)
    {
        $this->Bidang_model->remove($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bidang');
    }
    public function edit($id)
    {
        $data['title'] = "Halaman Edit Bidang";
        $data['isi_bidang'] = $this->Bidang_model->get_id($id);
        // var_dump($data['isi_bidang']);
        // die;
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_edit_bidang', $data);
        $this->load->view('Templates/footer');
        // redirect('bidang');
    }
    public function proses_edit()
    {

        $kode = $this->input->post('kode_rek');
        $nama = $this->input->post('Nama_rek');

        $id = $this->input->post('id_bidang');

        $objek = array(
            'kode_rek' => $kode,
            'Nama_rek' => $nama
        );
        $this->Bidang_model->update($id, $objek);
        redirect('bidang');
    }
}