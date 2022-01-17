<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function addDataAuth()
    {
        $data = [
            'id_user_role' => htmlspecialchars($this->input->post('id'), true),
            'nis' => htmlspecialchars($this->input->post('nis'), true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'is_active' => 1,
            'image' => 'default.jpg',
            'created_at' => time(),
            'username' => htmlspecialchars($this->input->post('username'), true)
        ];

        $this->db->insert('user_db', $data);
    }
    public function updateIsActive($id)
    {
        $data = array(
            'is_active' => 1,
        );
        $this->db->where('id_user_role', $id);
        $this->db->update('user_db', $data);
    }
    public function updateNonActive($id)
    {
        $data = array(
            'is_active' => 0,
        );
        $this->db->where('id_user_role', $id);
        $this->db->update('user_db', $data);
    }
    public function getData($id)
    {
        $this->db->where('id_user_role', $id);
        return $this->db->get('user_db')->row_array();
    }
    public function getDataLoginGuru($nis)
    {
        $this->db->select('*');
        $this->db->from('user_guru');
        $this->db->join('user_db', 'user_guru.id_user = user_db.id_user_role');
        $this->db->where('user_db.nis', $nis);
        $query = $this->db->get();
        return $query->row_array();
    }
}
