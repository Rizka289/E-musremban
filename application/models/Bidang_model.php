<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    public function getAll()
    {
        $this->db->order_by('id_bidang', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        // $this->db->limit(1);
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
    }
    public function remove($id)
    {
        $this->db->delete('tbl_bidang', array('id_bidang' => $id));
    }
    public function get_id($id)
    {
        return $this->db->where('id_bidang', $id)->get('tbl_bidang')->row();
    }
    public function update($id, $objek)
    {
        return $this->db->where('id_bidang', $id)->update('tbl_bidang', $objek);
    }
}