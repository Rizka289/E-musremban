<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Tahun_model extends CI_Model
{
    public function getAll()
    {
        $this->db->order_by('id_tahun', 'DESC');
        $query = $this->db->get('tbl_tahun');
        return $query->result();
    }
    public function insert()
    {
        $data = [
            'tahun' => htmlspecialchars($this->input->post('tahun', true))
        ];
        $this->db->insert('tbl_tahun', $data);
    }
    public function remove($id)
    {
        $this->db->where('id_tahun', $id);
        $this->db->delete('tbl_tahun');
    }

    public function get_id($id)
    {
        return $this->db->where('id_tahun', $id)->get('tbl_tahun')->row();
    }
    public function update($id, $objek)
    {
        return $this->db->where('id_tahun', $id)->update('tbl_tahun', $objek);
    }
}