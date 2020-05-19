<?php
defined('BASEPATH') or exit('No direct script accesss allowed');
class Profile_model extends CI_Model
{
    public function getAll()
    {
        $this->db->get('tbl_user');
        $this->db->get('profil');
    }
}