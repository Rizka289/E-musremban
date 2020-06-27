<?php
defined('BASEPATH') or exit('No direct script accesss allowed');
class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Halaman Profile';


        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("templates/topbar");
        $this->load->view("profile/profile", $data);
        $this->load->view("templates/footer");
    }
}