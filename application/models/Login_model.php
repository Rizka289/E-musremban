<?php
class Login_model extends CI_Model
{
    public function tambahDataUser()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('name', true)),
            'image' => '-',
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'alamat' => '-',
            'agama' => '-',
            'no_hp' => '-'
        ];
        if ($this->input->post('pilih') == 'desa') {
            $this->db->insert('desa', $data);
        } elseif ($this->input->post('pilih') == 'dusun') {
            $this->db->insert('dusun', $data);
        }
    }
    public function getAll()
    {
        return $this->db->get('dusun')->result();
    }
    public function remove($id)
    {
        $this->db->delete('dusun', array('id_dusun' => $id));
    }
    public function tambahDusun()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'image' => '-',
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'no_hp' => htmlspecialchars($this->input->post('nope'))
        ];
        $this->db->insert('dusun', $data);
    }
}