<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Dusun extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        // $this->load->view("admin/index", $data);
        $this->load->view("templates/footer");
    }
}