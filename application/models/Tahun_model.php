<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class Tahun_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('tbl_tahun')->result();
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
        $this->db->where('id_tahun', $id);
        $this->db->get('tbl_tahun')->row();
    }
}