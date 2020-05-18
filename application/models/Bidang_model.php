<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Bidang_model extends CI_Model
{
    public function getAll($limit, $start)
    {
        return $this->db->get('tbl_bidang', $limit, $start)->result();
    }
    public function insert()
    {
        $data = [
            'kode_rek' => htmlspecialchars($this->input->post('korek', true)),
            'Nama_rek' => htmlspecialchars($this->input->post('narek', true))
        ];
        $this->db->insert('tbl_bidang', $data);
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