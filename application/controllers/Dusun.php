<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Dusun extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';

        $this->load->view("templates/template", $data);
        $this->load->view("templates/footer");
    }
}