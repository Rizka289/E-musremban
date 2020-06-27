<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_model');
    }
    public function index()
    {
        $data['title'] = 'HalamanTahun';
        $data['tahun'] = $this->Tahun_model->getAll();

        $this->load->view("ext/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view("Input Data/v_tahun", $data);
        $this->load->view("ext/footer");
    }
    public function insert()
    {
        $this->Tahun_model->insert();
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect('tahun', 'refresh');
    }
    public function hapus($id)
    {
        $this->Tahun_model->remove($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('tahun', 'refresh');
    }
    public function edit($id)
    {
        $data['title'] = "Halaman Edit Tahun";
        $data['isi_tahun'] = $this->Tahun_model->get_id($id);
        // var_dump($data['isi_tahun']);
        // die;
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_edit_tahun', $data);
        $this->load->view('Templates/footer');
    }
    public function proses_edit()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $objek = array(
            'tahun' => $tahun
        );
        $this->Tahun_model->update($id, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil diedit');
        redirect('tahun', 'refresh');
    }
}