<?php
defined('BASEPATH') or exit('No direct script accesss allowed');
class Profile_model extends CI_Model
{
    public function getDesa()
    {
        return $this->db->get('desa')->result();
    }
    public function getDusun()
    {
        return $this->db->get('dusun')->result();
    }
}