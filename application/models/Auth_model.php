<?php
class Auth_model extends CI_Model
{

    public function tambahDataUser()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => $this->input->post('jenisKelamin') == 'lk' ? 'defaultL.jpg' : 'defaultP.jpg',
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'role' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('tbl_user', $data);
    }
}