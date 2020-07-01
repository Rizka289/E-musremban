<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Data_model extends CI_Model
{
    // =======================INDEX=======================================
    public function getAll()
    {
        $this->db->order_by('id_tahun', 'DESC');
        $query = $this->db->get('tbl_tahun');
        return $query->result();
    }
    public function getAllBidang()
    {
        $this->db->order_by('id_bidang', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        $query = $this->db->get();
        return $query->result();
    }
    public function getUsulan()
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
    public function getTahun()
    {
        return $this->db->get('tbl_tahun')->result();
    }
    // ======================================TAMBAH==================================
    public function insertTahun()
    {
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun', true))
        ];
        $this->db->insert('tbl_tahun', $data);
    }
    public function createUsulan($objek)
    {
        $this->db->insert('tbl_usulan', $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    function createBidang($objek)
    {
        $this->db->insert('tbl_bidang', $objek);
    }
    //===========================================HAPUS===================================
    public function removeTahun($id)
    {
        $this->db->where('id_tahun', $id);
        $this->db->delete('tbl_tahun');
    }
    public function removeUsulan($id)
    {
        $this->db->delete('tbl_usulan', array('id_usulan' => $id));
    }
    public function removeBidang($id)
    {
        $this->db->delete('tbl_bidang', array('id_bidang' => $id));
    }
    // =====================================GET ID=================================================
    public function get_idTahun($id)
    {
        return $this->db->where('id_tahun', $id)->get('tbl_tahun')->row();
    }
    public function get_idUsulan($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_usulan');
        $this->db->join('tbl_bidang', 'tbl_usulan.id_bidang = tbl_bidang.id_bidang');
        $this->db->join('tbl_sub_bidang', 'tbl_usulan.id_sub_bidang = tbl_sub_bidang.Id_sub_bidang');
        $this->db->where('id_usulan', $id);
        $query  = $this->db->get()->row();
        return $query;
        // return $this->db->where('id_usulan', $id)->get('tbl_usulan')->row();
    }
    public function get_idBidang($id)
    {
        return $this->db->where('id_bidang', $id)->get('tbl_bidang')->row();
    }
    // =========================================UPDATE========================================================
    public function updateTahun($id, $objek)
    {
        return $this->db->where('id_tahun', $id)->update('tbl_tahun', $objek);
    }
    public function updateUsulan($id, $objek)
    {
        return $this->db->where('id_usulan', $id)->update('tbl_usulan', $objek);
    }
    public function updateBidang($id, $objek)
    {
        return $this->db->where('id_bidang', $id)->update('tbl_bidang', $objek);
    }
}