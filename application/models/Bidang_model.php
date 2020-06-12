<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTahun()
    {
        return $this->db->get('tbl_tahun')->result();
    }
    function create($objek)
    {
        $this->db->insert('tbl_bidang', $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    public function remove($id)
    {
        $this->db->delete('tbl_bidang', array('id_bidang' => $id));
    }
}