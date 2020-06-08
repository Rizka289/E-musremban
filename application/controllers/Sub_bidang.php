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
        // pagination
        $config['base_url'] = site_url('sub_bidang/index');
        $config['total_rows'] = $this->db->count_all('tbl_sub_bidang');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config["num_links"] = floor($choice);
        $config['first_link'] = 'Firts';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class = "pagging text-center"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] =  '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] =   '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] =  '<span aria-hidden="true">&raquo;</span></li></span>';
        $config['prev_tag_open'] =   '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] =  '</span>Next</li>';
        $config['first_tag_open'] =  '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] =  '</span></li>';
        $config['last_tag_open'] =  '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] =  '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ?
            $this->uri->segment(3) : 0;
        $data['subBidang'] = $this->SubBidang_model->getAll($config["per_page"], $data['page']);
        $data['Sub'] = $this->SubBidang_model->getSub();
        $data['pagination'] = $this->pagination->create_links();

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
        $idrek = $this->input->post('idrekening');

        $objek = array(
            'Sub_rek' => $sub,
            'nama_sub_bidang' => $isi,
            'id_bidang' => $idrek
        );
        $data['Sub'] = $this->SubBidang_model->getSub();
        $this->SubBidang_model->update($sub, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil diedit');
        redirect('sub_bidang');
    }
}