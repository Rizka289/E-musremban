<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class UserDusun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserDusun_model');
    }
    public function index()
    {
        $config['base_url'] = site_url('UserDusun/index');
        $config['total_rows'] = $this->db->count_all('dusun');
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
        $data['user'] = $this->UserDusun_model->getAll($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Kelola User Dusun';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kelola user dusun/v_dusun');
        $this->load->view('templates/footer');
    }
    public function hapus($id)
    {
        $this->UserDusun_model->remove($id);
        redirect('UserDusun');
    }
}