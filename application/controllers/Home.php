<?php
class Home extends CI_Controller
{
    public function index($nama = '')
    {
        $data['title'] = 'Selamat Datang di E-Musrembang Desa Tamansari';

        $this->load->view('utama/index', $data);
    }
}