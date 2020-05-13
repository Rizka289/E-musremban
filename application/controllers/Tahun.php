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
        $data['title'] = 'Input Data Tahun';
        $data['tahun'] = $this->Tahun_model->getAll();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("Input Data/v_tahun", $data);
        $this->load->view("templates/footer");
    }
    public function insert()
    {
        $this->Tahun_model->insert();
        redirect('tahun', 'refresh');
    }
    public function hapus($id)
    {
        if ($this->Tahun_model->remove($id)) {
            echo "
            <script>
                alert('Data Berhasil Dihapus');
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Dihapus');
            </script>
            ";
            redirect('tahun', 'refresh');
        }
    }
    public function edit($id)
    {
        $this->Tahun_model->get_id($id);
        redirect('tahun', 'refresh');
    }
}