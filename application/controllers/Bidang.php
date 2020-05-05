<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Bidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_model');
    }
}