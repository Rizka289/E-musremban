<?php
class Login_model extends CI_Model
{
    public function tambahDataUser()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('name', true)),
            'image' => $this->input->post('jenisKelamin') == 'lk' ? 'defaultL.jpg' : 'defaultP.jpg',
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'alamat' => 2,
            'agama' => 1,
            'no_hp' => 5
        ];
        if ($this->input->post('pilih') == 'desa') {
            $this->db->insert('desa', $data);
        } elseif ($this->input->post('pilih') == 'dusun') {
            $this->db->insert('dusun', $data);
        }
    }
}