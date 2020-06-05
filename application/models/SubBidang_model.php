<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class SubBidang_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_bidang');
        $this->db->join('tbl_sub_bidang', 'tbl_sub_bidang.id_bidang = tbl_bidang.id_bidang');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSub()
    {
        return $this->db->get('tbl_bidang')->result();
    }
    public function create($objek)
    {
        $this->db->insert('tbl_sub_bidang', $objek);
    }
}