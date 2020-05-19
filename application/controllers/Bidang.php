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
        $config['base_url'] = site_url('bidang/index');
        $config['total_rows'] = $this->db->count_all('tbl_bidang');
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['bidang'] = $this->Bidang_model->getAll($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();


        $data['title'] = 'Halaman Bidang';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Input Data/v_bidang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $this->Bidang_model->insert();
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
        redirect('bidang', 'refresh');
    }
    public function hapus($id)
    {
        $this->Bidang_model->remove($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
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

        $kode = $this->input->post('korek');
        $nama = $this->input->post('narek');

        $id = $this->input->post('id');

        $objek = array(
            'kode_rek' => $kode,
            'Nama_rek' => $nama
        );
        $this->Bidang_model->update($id, $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Diedit');
        redirect('bidang');
    }
}