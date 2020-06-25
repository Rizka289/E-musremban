<?php
defined('BASEPATH') or exit('No direct script accesss allowed');

class UserDusun_model extends CI_Model
{
    public function getAll($limit, $start)
    {
        return $this->db->get('dusun', $limit, $start)->result();
    }
    public function remove($id)
    {
        $this->db->delete('dusun', array('id_dusun' => $id));
    }
}