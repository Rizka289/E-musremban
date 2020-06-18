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
    public function getBidang()
    {
        return $this->db->get('tbl_bidang')->result();
    }
    public function getSub()
    {
        return $this->db->get('tbl_sub_bidang')->result();
    }
    public function create($objek)
    {
        $this->db->insert('tbl_usulan', $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    public function remove($id)
    {
        $this->db->delete('tbl_usulan', array('id_usulan' => $id));
    }
}