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
        $config['base_url'] = site_url('tahun/index');
        $config['total_rows'] = $this->db->count_all('tbl_tahun');
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
        $data['tahun'] = $this->Tahun_model->getAll($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'HalamanTahun';

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("Input Data/v_tahun", $data);
        $this->load->view("templates/footer");
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
        $this->session->set_flashdata('message', 'Data Berhasil Diedit');
        redirect('tahun', 'refresh');
    }
}