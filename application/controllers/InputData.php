<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class InputData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
    }
    public function index()
    {
        $data['title'] = 'Halaman Tahun';
        $data['tahun'] = $this->Data_model->getAll();

        $this->load->view("ext/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view("Input Data/v_tahun", $data);
        $this->load->view("ext/footer");
    }
    public function insert()
    {
        $this->Data_model->insertTahun();
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect('InputData', 'refresh');
    }
    public function hapus($id)
    {
        $this->Data_model->removeTahun($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('InputData', 'refresh');
    }
    public function edit($id)
    {
        $data['title'] = "Halaman Edit Tahun";
        $data['isi_tahun'] = $this->Data_model->get_idTahun($id);
        // var_dump($data['isi_tahun']);
        // die;
        $this->load->view('Templates/template', $data);
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
        $this->Data_model->updateTahun($id, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil diedit');
        redirect('InputData', 'refresh');
    }
    // =========================================BIDANG===================================================
    public function Bidang()
    {
        $data['title'] = 'Halaman Bidang';
        $data['bidang'] = $this->Data_model->getAllBidang();
        $data['tbl_t'] = $this->Data_model->getAll();

        $this->load->view('ext/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('Input Data/v_bidang', $data);
        $this->load->view('ext/footer');
    }
    public function createBidang()
    {
        $Thn = $this->input->post('tahun');
        $kode = $this->input->post('kode_rek');
        $nabid = $this->input->post('nama_bid');

        $objek = array(
            'id_tahun' => $Thn,
            'kode_rek' => $kode,
            'nama_bidang' => $nabid
        );
        $this->Data_model->createBidang($objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect('InputData/Bidang', 'refresh');
    }
    public function hapusBidang($id)
    {
        $this->Data_model->removeBidang($id);
        $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        redirect('InputData/Bidang');
    }
    public function editBidang($id)
    {
        $data['title'] = 'Halaman Edit Bidang';
        $data['isi_bidang'] = $this->Data_model->get_idBidang($id);
        $data['tbl_t'] = $this->Data_model->getAll();
        // var_dump($data['isi_bidang']);
        // die;
        $this->load->view('Templates/template', $data);
        $this->load->view('Input Data/v_edit_bidang', $data);
        $this->load->view('Templates/footer');
    }
    public function proses_editBidang()
    {

        $id = $this->input->post('id');
        $id_tahun = $this->input->post('tahun');
        $kode = $this->input->post('kode_rek');
        $nabid = $this->input->post('nama_bid');

        $objek = array(
            'id_tahun' => $id_tahun,
            'kode_rek' => $kode,
            'nama_bidang' => $nabid
        );
        $this->Data_model->updateBidang($id, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil diedit');
        redirect('InputData/Bidang', 'refresh');
    }

    // ===============================================USULAN====================================================
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
    public function createUsulan()
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
        );
        // var_dump($objek);
        // die('save');
        $this->Data_model->createUsulan($objek);
        redirect('InputData/Usulan', 'refresh');
    }
    function updateUsulan($usulan, $status)
    {
        $this->db->where('id_usulan', $usulan)->set('status', $status)->update('tbl_usulan');
        redirect('InputData/Usulan', 'refresh');
    }
    public function hapusUsulan($id)
    {
        $this->Data_model->removeUsulan($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('InputData/Usulan');
    }
    public function editUsulan($id)
    {
        $data['title'] = 'Halaman Edit Usulan';
        $data['isi_usulan'] = $this->Data_model->get_idUsulan($id);
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        // var_dump($data['isi_usulan']);
        // die;
        $this->load->view('Templates/template', $data);
        $this->load->view('Input Data/v_edit_usulan', $data);
        $this->load->view('Templates/footer');
    }
    public function proses_editUsulan()
    {
        $id_usulan = $this->input->post('id');
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
            'total' => $subT
        );
        // var_dump($objek);
        // die('telat');
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        $this->Data_model->updateUsulan($id_usulan, $objek);
        // $this->sessionn->set_flashdata('message', 'Data Berhasil diedit');
        redirect('InputData/Usulan');
    }
    public function detail($id)
    {
        $data['title'] = 'Halaman Edit Usulan';
        $data['isi_usulan'] = $this->Data_model->get_idUsulan($id);
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        // var_dump($data['isi_usulan']);
        // die;
        // var_dump($objek);
        // die('telat');
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        $this->load->view("templates/template");
        $this->load->view("Input Data/v_detail");
        $this->load->view("templates/footer");
    }
}