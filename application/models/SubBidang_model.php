<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class SubBidang_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        $this->db->join('tbl_sub_bidang', 'tbl_sub_bidang.id_bidang = tbl_bidang.id_bidang');
        $query = $this->db->get();
        return $query->result();
    }
    public function gettahun()
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
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
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    public function remove($id)
    {
        $this->db->delete('tbl_sub_bidang', array('id_sub_bidang' => $id));
    }
    public function get_id($id)
    {
        return $this->db->where('Id_sub_bidang', $id)->get('tbl_sub_bidang')->row();
    }
    public function update($id, $objek)
    {
        return $this->db->where('id_sub_bidang', $id)->update('tbl_sub_bidang', $objek);
    }
    public function getdb($year)
    {
        return $this->db->query('SELECT * FROM tbl_tahun,tbl_bidang WHERE tbl_tahun.id_tahun = tbl_bidang.id_tahun AND tbl_tahun.tahun = ' . $year)->result();
    }
}