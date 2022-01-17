<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function getAllMurid($kelas)
    {
        $this->db->select('*');
        $this->db->from('link_guru_to_murid');
        $this->db->join('kelas', 'kelas.id_kelas = link_guru_to_murid.id_kelas');
        $this->db->join('user_murid', 'user_murid.id_user = link_guru_to_murid.id_murid');
        $this->db->where('kelas.id_kelas', $kelas);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function addNotes($guru)
    {
        $data = array(
            'nama_notes' => $this->input->post('judul'),
            'isi_notes' => $this->input->post('isi'),
            'id_guru' => $guru,
        );

        $this->db->insert('notes_guru', $data);
    }
    public function getAllMenu($role)
    {
        $this->db->select();
        $this->db->where('menu_id', $role);
        $query = $this->db->get('user_sub_menu');
        return $query->result_array();
    }
    public function getAllGuru($roleid)
    {
        $this->db->select('*');
        $this->db->from('link_guru_to_murid as a');
        $this->db->join('user_guru as b', 'b.id_user = a.id_guru');
        $this->db->join('kelas as c', 'c.id_kelas = a.id_kelas');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('b.role_id', $roleid);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataGuru($roleid)
    {
        $this->db->select('c.nama_lengkap,b.is_active');
        $this->db->from('user_db as b');
        $this->db->join('user_guru as c', 'c.id_user=b.id_user_role');
        $this->db->where('b.role_id', $roleid);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllJadwalOnline($matpel)
    {
        $this->db->select('a.hari, a.jam, a.link_kelas, c.nama_matpel, d.kelas');
        $this->db->from('schedule_guru AS a');
        $this->db->join('buku AS b', 'b.id_buku = a.id_buku');
        $this->db->join('matpel AS c', 'c.id_matpel = a.id_matpel');
        $this->db->join('kelas AS d', 'd.id_kelas = a.id_kelas');
        $this->db->where('a.id_matpel', $matpel);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllScore($guru, $limit, $start, $keyword)
    {

        $this->db->select('a.score, g.buku, b.nama_lengkap, e.kelas');
        $this->db->from('score as a');
        $this->db->join('user_murid as b', 'b.id_user = a.id_murid');
        $this->db->join('post_file as c', 'c.id_post = a.id_post');
        $this->db->join('post_guru as f', 'f.id_post = a.id_post');
        $this->db->join('user_guru as d', 'd.id_user = f.id_guru');
        $this->db->join('kelas as e', 'b.id_kelas = e.id_kelas');
        $this->db->join('buku as g', 'd.id_matpel = g.id_matpel');
        $this->db->like('b.nama_lengkap', $keyword);
        $this->db->or_like('e.kelas', $keyword);
        $this->db->limit($limit, $start);
        $this->db->where('f.id_guru', $guru);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countAllScore($guru)
    {
        $this->db->select('*');
        $this->db->from('score as a');
        $this->db->join('user_murid as b', 'b.id_user = a.id_murid');
        $this->db->join('post_file as c', 'c.id_post = a.id_post');
        $this->db->join('post_guru as f', 'f.id_post = a.id_post');
        $this->db->join('user_guru as d', 'd.id_user = f.id_guru');
        $this->db->join('kelas as e', 'b.id_kelas = e.id_kelas');
        $this->db->where('d.id_user', $guru);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getAllLesson($matpel)
    {
        $this->db->select('a.id_matpel,f.kelas,b.color,f.id_kelas,b.nama_matpel');
        $this->db->from('lesson_guru as a');
        $this->db->join('matpel as b', 'b.id_matpel = a.id_matpel');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('kelas as f', 'f.id_kelas = a.id_kelas');
        $this->db->where('a.id_matpel', $matpel);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailLesson($kelas)
    {
        $where = [
            'a.id_kelas' => $kelas,
            // 'b.id_kelas' => $kelas
        ];
        $this->db->select('*');
        $this->db->from('pertemuan_guru as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('lesson_guru as c', 'c.id_kelas = a.id_kelas');
        $this->db->join('buku as d', 'd.id_matpel = c.id_matpel');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataProfile($session)
    {
        $this->db->select('*');
        $this->db->from('profile_guru AS a');
        $this->db->join('user_db AS b', 'b.id_user_role = a.id_guru');
        $this->db->join('kelas AS c', 'c.id_kelas = a.id_kelas');
        $this->db->join('user_guru AS d', 'd.id_user = a.id_guru');
        $this->db->join('negara AS e', 'e.id_negara = a.id_negara');
        $this->db->join('matpel AS f', 'f.id_matpel = d.id_matpel');
        $this->db->where('b.id_user_role', $session);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function jmlKelas()
    {
        return $this->db->get('kelas')->num_rows();
    }
    public function getNegara($id)
    {
        $this->db->select('b.negara');
        $this->db->from('user_guru AS a');
        $this->db->join('negara AS b', 'a.id_negara = b.id_negara');
        $this->db->where('a.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getTask($id_matpel)
    {
        $this->db->select('b.kelas,a.image, d.nama_matpel,a.id_kelas');
        $this->db->from('task as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        // $this->db->join('user_guru as c', 'c.id_matpel = d.id_matpel');
        $this->db->where('a.id_matpel', $id_matpel);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailTask($id_kelas)
    {
        $this->db->select('a.isi,b.kelas,c.nama_lengkap,c.gelar,a.created_at, d.nama_matpel,a.id_matpel,a.id_post');
        $this->db->from('post_guru as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCountDetailTask($id_kelas)
    {
        $this->db->select('a.isi,b.kelas,c.nama_lengkap,c.gelar,a.created_at, d.nama_matpel,a.id_matpel,a.id_post');
        $this->db->from('post_guru as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query;
    }
    public function getPost($id_post)
    {
        $this->db->select('a.isi,b.kelas,c.nama_lengkap,c.gelar,a.created_at, d.nama_matpel,a.id_matpel,a.id_post,a.judul,b.id_kelas');
        $this->db->from('post_guru as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_post', $id_post);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getFile($id_post)
    {
        $this->db->select('a.nama_file');
        $this->db->from('post_file as a');
        $this->db->join('post_guru as b', 'b.id_post = a.id_post');
        $this->db->where('a.id_post', $id_post);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getComment($id_post)
    {
        $this->db->select('*');
        $this->db->from('comment_guru as a');
        // $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        // $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_post', $id_post);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCommentMurid($id_post)
    {
        $this->db->select('*');
        $this->db->from('comment_murid as a');
        // $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_murid as c', 'c.id_user = a.id_murid');
        // $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_post', $id_post);
        $query = $this->db->get();
        return $query->result_array();
    }
}
