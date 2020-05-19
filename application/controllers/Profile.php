<?php
defined('BASEPATH') or exit('No direct script accesss allowed');
class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }
    public function index()
    {
        $data['title'] = 'Halaman Profile';
        $data['user'] = $this->Profile_model->getAll();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("profile/profile", $data);
        $this->load->view("templates/footer");
    }
}