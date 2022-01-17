<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid_model extends CI_Model
{
    public function getDataBuku($session)
    {
        $this->db->select(' matpel.nama_matpel , matpel.id_matpel, kelas.kelas, user_guru.nama_lengkap, user_guru.gelar,matpel.color');
        $this->db->from('link_guru_to_murid');
        $this->db->join('matpel', 'matpel.id_matpel = link_guru_to_murid.id_matpel');
        $this->db->join('user_db', 'user_db.id_user_role = link_guru_to_murid.id_murid');
        $this->db->join('kelas', 'kelas.id_kelas = link_guru_to_murid.id_kelas');
        $this->db->join('user_guru', 'user_guru.id_user = link_guru_to_murid.id_guru');
        // $this->db->join('user_murid', 'user_murid.id_user = link_guru_to_murid.id_murid');
        $this->db->where('link_guru_to_murid.id_kelas', $session);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllHistory($where)
    {
        $this->db->select('b.id_matpel,b.nama_matpel,d.kelas, c.nama_lengkap, b.color , c.gelar');
        $this->db->from('task_murid as a');
        $this->db->join('matpel as b', 'b.id_matpel = a.id_matpel');
        $this->db->join('user_guru as c', 'c.id_matpel = a.id_matpel');
        $this->db->join('kelas as d', 'd.id_kelas = a.id_kelas');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllMenu($role)
    {
        $this->db->select();
        $this->db->where('menu_id', $role);
        $query = $this->db->get('user_sub_menu');
        return $query->result_array();
    }
    public function getTodoCompleted($session)
    {
        $where = ['user_murid.id_user' => $session, 'completed.is_active =' => 1];
        // Buku == bab
        $this->db->select('user_murid.id_user,completed.is_active');
        $this->db->from('completed');
        $this->db->join('user_murid', 'user_murid.id_user = completed.id_murid');
        $this->db->join('buku', 'buku.id_buku = completed.id_buku');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getTodoInproses($session)
    {
        $where = ['user_murid.id_user' => $session, 'inprogress.is_active =' => 1];
        // Buku == bab
        $this->db->select('inprogress.is_active');
        $this->db->from('inprogress');
        $this->db->join('user_murid', 'user_murid.id_user = inprogress.id_murid');
        $this->db->join('buku', 'buku.id_buku = inprogress.id_buku');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getTodoMissing($session)
    {
        $where = ['user_murid.id_user' => $session, 'is_active =' => 1];
        // Buku == bab
        $this->db->select('missing.is_active');
        $this->db->from('missing');
        $this->db->join('user_murid', 'user_murid.id_user = missing.id_murid');
        $this->db->join('buku', 'buku.id_buku = missing.id_buku');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getDataProfile($session)
    {
        $this->db->select('e.negara,d.nama_lengkap,b.password, b.nis, b.image, b.created_at, c.kelas, d.angkatan, b.email, d.id_user,b.nis,b.username,b.created_at');
        $this->db->from('profile_murid AS a');
        $this->db->join('user_db AS b', 'b.id_user_role = a.id_murid');
        $this->db->join('kelas AS c', 'c.id_kelas = a.id_kelas');
        $this->db->join('user_murid AS d', 'd.id_user = a.id_murid');
        $this->db->join('negara AS e', 'e.id_negara = a.id_negara');
        $this->db->where('b.id_user_role', $session);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getNegara($id)
    {
        $this->db->select('b.negara');
        $this->db->from('user_murid AS a');
        $this->db->join('negara AS b', 'a.id_negara = b.id_negara');
        $this->db->where('a.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function jmlKelas()
    {
        return $this->db->get('kelas')->num_rows();
    }
    public function updateProfile($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user_murid', $data);
    }
    public function getDataGuru($session)
    {
        $this->db->select('b.nama_lengkap, d.kelas, c.nama_matpel,b.gelar,e.nis');
        $this->db->from('link_guru_to_murid AS a');
        $this->db->join('matpel AS c', 'c.id_matpel = a.id_matpel');
        $this->db->join('user_guru AS b', 'b.id_user = a.id_guru');
        $this->db->join('kelas AS d', 'd.id_kelas = a.id_kelas');
        $this->db->join('user_db AS e', 'e.id_user_role = a.id_guru');
        $this->db->where('a.id_murid', $session);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataLogin()
    {
        $this->db->select('user_murid.nama_lengkap,user_murid.id_user,user_db.is_active');
        $this->db->from('user_murid');
        $this->db->join('user_db', 'user_db.id_user_role = user_murid.id_user');
        $this->db->where('user_db.is_active', 1);
        // $this->db->where('b.id_user_role', $session);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getAllMurid($roleid)
    {
        $this->db->select('*');
        $this->db->from('user_db');
        $this->db->join('user_murid', 'user_db.id_user_role = user_murid.id_user');
        $this->db->where('user_db.role_id', $roleid);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBuku($kelas)
    {
        $this->db->select('b.nama_matpel,d.buku,d.bab,f.kelas,c.nama_lengkap,c.gelar,a.hari,a.jam');
        $this->db->from('offline_class as a');
        $this->db->join('matpel as b', 'b.id_matpel = a.id_matpel');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('buku as d', 'd.id_matpel = a.id_matpel');
        $this->db->join('kelas as f', 'f.id_kelas = a.id_kelas');
        $this->db->where('a.id_kelas', $kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getLesson($kelas)
    {
        $this->db->select('a.id_lesson_murid,b.nama_matpel,f.kelas,c.nama_lengkap,c.gelar,b.color');
        $this->db->from('lesson_murid as a');
        $this->db->join('matpel as b', 'b.id_matpel = a.id_matpel');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('kelas as f', 'f.id_kelas = a.id_kelas');
        $this->db->where('a.id_kelas', $kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBukuOnline($kelas)
    {
        $this->db->select('b.nama_matpel,d.buku,d.bab,f.kelas,c.nama_lengkap,c.gelar');
        $this->db->from('online_class as a');
        $this->db->join('matpel as b', 'b.id_matpel = a.id_matpel');
        $this->db->join('user_guru as c', 'b.id_matpel = a.id_matpel');
        $this->db->join('buku as d', 'd.id_matpel = a.id_matpel');
        $this->db->join('kelas as f', 'f.id_kelas = a.id_kelas');
        $this->db->where('a.id_kelas', $kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllGuru()
    {
        $this->db->select('b.nis,d.nama_lengkap,d.gelar,c.nama_matpel');
        $this->db->from('link_guru_to_murid as a');
        $this->db->join('user_db as b', 'b.id_user_role = a.id_guru');
        $this->db->join('user_guru as d', 'd.id_user = a.id_guru');
        $this->db->join('matpel as c', 'c.id_matpel = a.id_matpel');
        $this->db->where('b.role_id', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailLesson($id_lesson)
    {
        $where = array('a.id_lesson_murid' => $id_lesson);
        $this->db->select('*');
        $this->db->from('pertemuan_murid as a');
        $this->db->join('lesson_murid as b', 'b.id_lesson_murid = a.id_lesson_murid');
        $this->db->join('matpel as c', 'c.id_matpel = b.id_matpel');
        $this->db->join('buku as d', 'd.id_buku = a.id_buku');
        // $this->db->join('matpel as b', 'b.id_matpel = b.id_matpel');
        // $this->db->join('user_murid as e', 'e.id_user = a.id_user');
        // $this->db->join('link_guru_to_murid as e', 'e.id_kelas = a.id_kelas');
        // $this->db->join('link_guru_to_murid as e', 'e.id_kelas = a.id_kelas');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    // public function getPengumuman($id_lesson){

    // }
    public function getPresensi($id_matpel)
    {
        $where = array('a.id_buku' => $id_matpel);
        $this->db->select('a.presensi,a.rps,c.buku,a.link_belajar');
        $this->db->from('pertemuan as a');
        $this->db->join('user_murid as b', 'b.id_user = a.id_murid');
        $this->db->join('buku as c', 'c.id_buku = a.id_buku');
        // $this->db->join('user_murid as e', 'e.id_user = a.id_user');
        // $this->db->join('link_guru_to_murid as e', 'e.id_kelas = a.id_kelas');
        // $this->db->join('link_guru_to_murid as e', 'e.id_kelas = a.id_kelas');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    // public function getDataBukuDetail($id_matpel)
    // {
    //     $query = $this->db->get_where('buku', ['id_matpel' => $id_matpel]);
    //     return $query->result_array();
    // }
    public function getPengumuman($id_kelas)
    {
        $this->db->select('a.isi');
        $this->db->from('pengumuman as a');
        $this->db->join('lesson_murid as c', 'c.id_lesson_murid = a.id_lesson_murid');
        $this->db->where('c.id_lesson_murid', $id_kelas);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getKelas($id_user)
    {
        $this->db->select('a.kelas,a.id_kelas');
        $this->db->from('kelas as a');
        $this->db->join('user_murid as b', 'b.id_kelas = a.id_kelas');
        $this->db->where('b.id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tambahPresensi($id_murid)
    {

        $data = array(
            'id_murid' => $id_murid,
            'id_kelas' => $this->input->post('kelas'),
            'id_matpel' => $this->input->post('matpel'),
            'is_active' => 1,
            'created_at' => time()
        );

        $this->db->insert('presensi', $data);
    }
    public function getTask($id_kelas)
    {
        $this->db->select('d.nama_matpel, b.kelas, a.image, c.nama_lengkap,c.gelar,d.id_matpel');
        $this->db->from('task_murid as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('b.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetailTask($id_matpel)
    {
        $this->db->select('a.isi,b.kelas,c.nama_lengkap,c.gelar,a.created_at, d.nama_matpel,a.id_matpel,a.id_post');
        $this->db->from('post_guru as a');
        $this->db->join('kelas as b', 'b.id_kelas = a.id_kelas');
        $this->db->join('user_guru as c', 'c.id_user = a.id_guru');
        $this->db->join('matpel as d', 'd.id_matpel = a.id_matpel');
        $this->db->where('a.id_matpel', $id_matpel);
        $query = $this->db->get();
        return $query->result_array();
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
