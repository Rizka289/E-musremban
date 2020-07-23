<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Data_model extends CI_Model
{
    // =======================TAHUN=======================================
    public function getAll()
    {
        $this->db->order_by('id_tahun', 'DESC');
        $query = $this->db->get('tbl_tahun');
        return $query->result();
    }
    public function insertTahun()
    {
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun', true))
        ];
        $this->db->insert('tbl_tahun', $data);
    }
    public function removeTahun($id)
    {
        $this->db->where('id_tahun', $id);
        $this->db->delete('tbl_tahun');
    }
    public function get_idTahun($id)
    {
        return $this->db->where('id_tahun', $id)->get('tbl_tahun')->row();
    }
    public function updateTahun($id, $objek)
    {
        return $this->db->where('id_tahun', $id)->update('tbl_tahun', $objek);
    }

    // ===================================BIDANG=======================
    public function getAllBidang()
    {
        $this->db->order_by('id_bidang', 'DESC');
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        $query = $this->db->get();
        return $query->result();
    }
    function createBidang($objek)
    {
        $this->db->insert('tbl_bidang', $objek);
    }
    public function removeBidang($id)
    {
        $this->db->delete('tbl_bidang', array('id_bidang' => $id));
    }
    public function get_idBidang($id)
    {
        return $this->db->where('id_bidang', $id)->get('tbl_bidang')->row();
    }
    public function updateBidang($id, $objek)
    {
        return $this->db->where('id_bidang', $id)->update('tbl_bidang', $objek);
    }
    public function panggildb($year)
    {
        return $this->db->query('SELECT * FROM tbl_tahun,tbl_bidang WHERE tbl_tahun.id_tahun = tbl_bidang.id_tahun AND tbl_tahun.tahun = ' . $year);
    }
    // ============================USULAN===============================
    public function createUsulan($objek)
    {
        $this->db->insert('tbl_usulan', $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    public function getUsulan()
    {
        $this->db->select('*');
        $this->db->from('tbl_usulan');
        $this->db->join('tbl_bidang', 'tbl_usulan.id_bidang = tbl_bidang.id_bidang');
        $this->db->join('tbl_sub_bidang', 'tbl_sub_bidang.id_sub_bidang = tbl_usulan.id_sub_bidang');

        if ($this->session->userdata('user') == 'dusun')
            $this->db->where('tbl_usulan.id_dusun', $this->session->userdata('id'));

        $query  = $this->db->get();
        return $query->result();

        // var_dump($query->result());
        // die();
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
    public function removeUsulan($id)
    {
        $this->db->delete('tbl_usulan', array('id_usulan' => $id));
    }
    public function get_idUsulan($id)
    {
        $this->db->select('*, tbl_usulan.id_bidang as bidang , dusun.username As username');
        $this->db->from('tbl_usulan');
        $this->db->join('tbl_bidang', 'tbl_usulan.id_bidang = tbl_bidang.id_bidang');
        $this->db->join('tbl_sub_bidang', 'tbl_sub_bidang.id_sub_bidang = tbl_usulan.id_sub_bidang');
        $this->db->join('dusun', 'dusun.id_dusun = tbl_usulan.id_dusun');


        $this->db->where('id_usulan', $id);
        $query  = $this->db->get()->row();
        return $query;
    }
    public function updateUsulan($id, $objek)
    {
        return $this->db->where('id_usulan', $id)->update('tbl_usulan', $objek);
    }
    // ============================EXCEL==================
    public function exporttable($year, $idbidang)
    {
        return $this->db->query("select * from tbl_usulan,tbl_bidang,tbl_sub_bidang,tbl_tahun WHERE 
        tbl_usulan.id_bidang = tbl_bidang.id_bidang AND tbl_usulan.id_sub_bidang = tbl_sub_bidang.Id_sub_bidang 
        AND tbl_bidang.id_tahun = tbl_tahun.id_tahun AND tbl_tahun.tahun = " . $year . " AND tbl_usulan.status = 'Ya'
        AND tbl_sub_bidang.id_sub_bidang=" . $idbidang);
    }
    public function exporttable2()
    {
        return $this->db->query("select * from tbl_bidang")->result();
    }
    public function getitem2($id)
    {
        return $this->db->query("select * from tbl_sub_bidang where id_bidang=" . $id);
    }
    // =================================SUB BIDANG========================

    public function getAllSub()
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_tahun = tbl_tahun.id_tahun');
        $this->db->join('tbl_sub_bidang', 'tbl_sub_bidang.id_bidang = tbl_bidang.id_bidang');
        $query = $this->db->get();
        return $query->result();
    }
    public function createSub($objek)
    {
        $this->db->insert('tbl_sub_bidang', $objek);
        $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
    }
    public function removeSub($id)
    {
        $this->db->delete('tbl_sub_bidang', array('id_sub_bidang' => $id));
    }
    public function id_sub($id)
    {
        return $this->db->where('Id_sub_bidang', $id)->get('tbl_sub_bidang')->row();
    }
    public function update($id, $objek)
    {
        return $this->db->where('Id_sub_bidang', $id)->update('tbl_sub_bidang', $objek);
    }
    public function getdb($year)
    {
        return $this->db->query('SELECT * FROM tbl_tahun,tbl_bidang WHERE tbl_tahun.id_tahun = tbl_bidang.id_tahun AND tbl_tahun.tahun =' . $year)->result();
    }
    // =======================================RKP==========================
    public function RKP($year)
    {
        return $this->db->query("select * from tbl_usulan,tbl_bidang,tbl_sub_bidang,tbl_tahun WHERE 
        tbl_usulan.id_bidang = tbl_bidang.id_bidang AND tbl_usulan.id_sub_bidang = tbl_sub_bidang.Id_sub_bidang 
        AND tbl_bidang.id_tahun = tbl_tahun.id_tahun AND tbl_tahun.tahun = " . $year . " AND tbl_usulan.status = 'Ya'");
    }
}