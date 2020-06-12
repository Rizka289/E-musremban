<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Usulan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_usulan');
        $this->db->join('tbl_bidang', 'tbl_usulan.id_bidang = tbl_bidang.id_bidang');
        $this->db->join('tbl_sub_bidang', 'tbl_usulan.id_sub_bidang = tbl_sub_bidang.Id_sub_bidang');
        $query  = $this->db->get();
        return $query->result();
    }
}