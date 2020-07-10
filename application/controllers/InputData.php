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
        $objek = [
            'id_tahun' => htmlspecialchars($this->input->post('tahun')),
            'kode_rek' => htmlspecialchars($this->input->post('kode_rek')),
            'nama_bidang' => htmlspecialchars($this->input->post('nama_bid'))
        ];

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
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
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
        $year = date("Y");
        $data['lte'] = $this->Data_model->panggildb($year);
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
        $objek = [
            'id_bidang' => htmlspecialchars($this->input->post('idrekening')),
            'Id_sub_bidang' => htmlspecialchars($this->input->post('sub')),
            'usulan' => htmlspecialchars($this->input->post('usulan')),
            'unit' => htmlspecialchars($this->input->post('unit')),
            'panjang' => htmlspecialchars($this->input->post('panjang')),
            'lebar' => htmlspecialchars($this->input->post('lebar')),
            'tinggi' => htmlspecialchars($this->input->post('tinggi')),
            'm3' => htmlspecialchars($this->input->post('m3')),
            'anggaran' => htmlspecialchars($this->input->post('anggaran')),
            'total' => htmlspecialchars($this->input->post('total')),
            'username' => htmlspecialchars($this->input->post('username'))
        ];
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
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
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
    // =================================DETAIL===========================
    public function detail($id)
    {
        $datausulan = $this->db->query('SELECT * FROM tbl_usulan WHERE is_open=0')->result();
        setcookie('usulan', json_encode($datausulan), time() + (86400 * 30), "/");
        $data['title'] = 'Halaman Detail Usulan';
        $data['isi_usulan'] = $this->Data_model->get_idUsulan($id);
        $data['bidang'] = $this->Data_model->getBidang();
        $data['subBi'] = $this->Data_model->getSub();
        $this->Data_model->updateUsulan($id, ['is_open' => 1]);
        // var_dump($data['isi_usulan']);
        // die;
        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_detail', $data);
        $this->load->view('Templates/footer');
    }
    // =================================SUB BIDANG========================
    function subBidang()
    {
        $data['subBidang'] = $this->Data_model->getAllSub();
        $data['Sub'] = $this->Data_model->getBidang();
        $year = date("Y");
        $data['dt'] = $this->Data_model->getdb($year);
        $data['title'] = 'Halaman Sub Bidang';

        $this->load->view('ext/header', $data);
        $this->load->view('Templates/sidebar');
        $this->load->view('Templates/topbar');
        $this->load->view('Input Data/v_SubBidang', $data);
        $this->load->view('ext/footer');
    }
    public function createSub()
    {
        $objek = [
            'id_bidang' => htmlspecialchars($this->input->post('idrekening')),
            'Sub_rek' => htmlspecialchars($this->input->post('SubRek')),
            'nama_sub_bidang' => htmlspecialchars($this->input->post('Nasub'))
        ];
        $this->Data_model->createSub($objek);
        redirect('InputData/subBidang', 'refresh');
    }
    public function hapusSub($id)
    {
        $this->Data_model->removeSub($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('InputData/subBidang', 'refresh');
    }
    public function editSub($id)
    {
        $data['title'] = "Halaman Edit Sub Bidang";
        $data['isi_subB'] = $this->Data_model->id_sub($id);
        $data['bidang'] = $this->Data_model->getBidang();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view('Input Data/v_edit_sub', $data);
        $this->load->view('templates/footer');
    }
    public function proses_E_Sub()
    {
        $id_sub_bidang = $this->input->post('id');
        $sub = $this->input->post('SubRek');
        $isi = $this->input->post('Nasub');
        $idrek = $this->input->post('idrekening');
        $objek = array(
            'Sub_rek' => $sub,
            'nama_sub_bidang' => $isi,
            'id_bidang' => $idrek
        );
        $data['bidang'] = $this->Data_model->getBidang();
        $this->Data_model->update($id_sub_bidang, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Diedit');
        redirect('InputData/subBidang');
    }
    //=============================================EXPORT EXCEL==============================================
    public function test()
    {
        $this->load->view("ext/test");
    }
    public function test2()
    {
        $year = Date('Y');
        $data['hasil'] = $this->Data_model->exporttable2();
        $this->load->view("ext/export-excel", $data);
    }
    // ===============================RKP=================
    public function RKP()
    {
        $data['title'] = "RENCANA KERJA PEMERINTAH";
        $year = date("Y");
        $data['usulan'] = $this->Data_model->RKP($year);


        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view('Input Data/v_RKP', $data);
        $this->load->view('templates/footer');
    }
    // =================================WELCOME==============================
    public function home()
    {
        $data['title'] = 'Home';

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view("utama/welcome");
        $this->load->view("templates/footer");
    }
}