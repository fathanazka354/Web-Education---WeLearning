<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Guru_model');
    }
    public function index()
    {
        // var_dump($this->session->userdata());
        // die;
        // title
        $data['judul'] = 'Dashboard';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));

        // Info
        $guru = $this->db->get_where('user_guru', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['murid'] = $this->db->get_where('link_guru_to_murid', ['id_matpel' => $guru['id_matpel']])->num_rows();
        // var_dump($data['murid']);
        // die;

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // notes
        $data['notes'] = $this->db->get_where('notes_guru', ['id_guru' => $this->session->userdata('id_user')])->result_array();

        // var_dump($this->session->userdata('role_id'));
        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        // $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        // die;


        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar');
        $this->load->view('guru/index', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function add_notes()
    {
        // title
        $data['judul'] = 'Dashboard';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();

        // Info
        $guru = $this->db->get_where('user_guru', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['murid'] = $this->db->get_where('link_guru_to_murid', ['id_matpel' => $guru['id_matpel']])->num_rows();

        $this->Guru_model->addNotes($data['user']['id_user_role']);
        redirect('guru');
    }
    public function update_notes()
    {
        $data = [
            'nama_notes' => $this->input->post('judul'),
            'isi_notes' => $this->input->post('isi'),
        ];
        $this->db->where('id_notes_guru', $this->input->post('id'));
        $this->db->update('notes_guru', $data);
        redirect('guru');
    }
    public function hapus_notes($id)
    {
        $this->db->where('id_notes_guru', $id);
        $this->db->delete('notes_guru');
        redirect('guru');
    }
    public function schedule_guru()
    {
        // title
        $data['judul'] = 'Schedule';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));

        // get data jadwal
        $id_matpel = $this->db->get_where('user_guru', ['id_user' => $data['user']['id_user_role']])->row_array();
        $data['jadwal_online'] = $this->Guru_model->getAllJadwalOnline($id_matpel['id_matpel']);
        // var_dump($data['jadwal_online']);
        // die;

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/schedule', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function score()
    {
        // title
        $data['judul'] = 'Score';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));

        // get data All Score

        // get all score
        $this->load->library('pagination');

        // $config['total_rows'] = $this->Guru_model->countAllScore($id);
        $config['total_rows'] = $this->Guru_model->countAllScore($id);
        $config['per_page'] = 3;


        // $data['score'] = $this->Guru_model->getScore();


        if ($this->input->post('search')) {
            $data['keyword'] = $this->input->post('search');
        } else {
            $data['keyword'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['score'] = $this->Guru_model->getAllScore($id, $config['per_page'], $data['start'], $data['keyword']);
        // var_dump($data['score']);
        // die;


        // get data kelas
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/score', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function lesson()
    {
        // title
        $data['judul'] = 'Lesson';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active'), 'role_id' => $this->session->userdata('role_id')])->num_rows();
        // var_dump($this->session->userdata('role_id'));
        // die;

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));

        // get data all lesson
        $id_matpel = $this->db->get_where('user_guru', ['id_user' => $data['user']['id_user_role']])->row_array();
        $data['lessons'] = $this->Guru_model->getAllLesson($id_matpel['id_matpel']);
        // var_dump($data['lessons']);
        // die;
        // var_dump($data['lessons']);
        // die;

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/lesson', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function profile()
    {
        // title
        $data['judul'] = 'Lesson';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));

        $data['profile'] = $this->Guru_model->getDataProfile($data['user']['id_user_role']);

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function changePassword()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['profile'] = $this->Guru_model->getDataProfile($data['user']['id_user_role']);
        $dat = ['negara' => $this->input->post('negara')];
        $data['jml_kelas'] = $this->Guru_model->jmlKelas();
        $data['judul'] = 'Edit Data';
        $data['jml_negara'] = $this->Guru_model->getNegara($data['user']['id_user_role']);
        $data['negara'] = $this->db->get('negara')->result_array();
        // var_dump($data['profile']);
        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);
        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar');
        $this->load->view('templates/guru/guru_topbar');
        $this->load->view('guru/change_password', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function updateProfile()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('id_user')])->row_array();
        // $data['profile'] = $this->Murid_model->getDataProfile($data['user']['id_user_role']);
        // $dat = ['negara' => $this->input->post('negara')];
        $data['jml_kelas'] = $this->Guru_model->jmlKelas();
        $data['judul'] = 'Edit Data';
        $this->form_validation->set_rules('current_password', 'current_password', 'trim');
        $this->form_validation->set_rules('password2', 'New Password', 'trim|min_length[3]|matches[password3]', [
            "matches" => "Password ora podo karo input Password konfirmasi",
            "min_length" => "Password kudu minimal 3 hurup",
        ]);
        $this->form_validation->set_rules('password3', 'Confirm New Password', 'trim|min_length[3]|matches[password2]', [
            "min_length" => "Password kudu minimal 3 hurup",
            "matches" => "Password ora podo karo input Password anyar"
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required');


        // $this->Murid_model->updateProfile($dat, $id);
        if ($this->form_validation->run() == false) {
            // die('here');
            $this->load->view('templates/murid/user_murid_header', $data);
            $this->load->view('templates/murid/user_murid_sidebar');
            $this->load->view('templates/murid/user_murid_topbar');
            $this->load->view('murid/change_password', $data);
            $this->load->view('templates/murid/user_murid_footer');
        } else {
            // die('here');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password2');
            $username = $this->input->post('username');
            $negara = $this->input->post('negara');

            // cek agmbar jika ada
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10000';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data();
                    $data['image'] = $new_image['file_name'];
                    // var_dump($data['image']);
                    // die;
                    $this->db->set('image', $data['image']);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            // var_dump($upload_image);
            // die;

            $this->db->set('username', $username);
            $this->db->set('negara', $negara);
            $this->db->where('nis', $this->session->userdata('nis'));
            $this->db->update('user_db');

            redirect('guru/profile');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message_err', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('guru/changePassword');
                // die('here');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message_err', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password!</div>');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    // die('here');
                    $this->db->set('password', $password_hash);
                    $this->db->where('nis', $this->session->userdata('nis'));
                    $this->db->update('user_db');
                    $this->session->set_flashdata('message_err', '<div class="alert alert-success" role="alert">password has changed</div>');
                    redirect('guru/profile');
                }
            }
            redirect('guru/profile');
        }
    }
    public function task_guru()
    {
        // title
        $data['judul'] = 'Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));
        $id_matpel = $this->db->get_where('user_guru', ['id_user' => $data['user']['id_user_role']])->row_array();
        $data['task'] = $this->Guru_model->getTask($id_matpel['id_matpel']);
        // var_dump($data['task']);
        // die;

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/task_guru', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function task_detail($kelas)
    {
        // title
        $data['judul'] = 'Detail Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);
        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));
        // get detail task
        $data['task'] = $this->Guru_model->getDetailTask($kelas);

        $data['id_kelas'] = $kelas;
        // var_dump($this->session->userdata('id_kelas'));
        // die;

        $this->form_validation->set_rules('isi', 'Isi', 'required');
        // $countId = $this->Guru_model->getCountDetailTask($kelas);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/guru/guru_header', $data);
            $this->load->view('templates/guru/guru_sidebar', $data);
            $this->load->view('templates/guru/guru_topbar', $data);
            $this->load->view('guru/task', $data);
            $this->load->view('templates/guru/guru_sidebar_r', $data);
            $this->load->view('templates/guru/guru_footer');
        } else {
            $data = [
                // 'id_guru' => $this->input->post('id_user'),
                'id_post' => $this->input->post('id'),
                'isi' => $this->input->post('isi'),
                'created_at' => time()
            ];
            $this->db->where('id_post', $this->input->post('id'));
            $this->db->update('post_guru', $data);
            redirect('guru/task_detail/' . $this->session->userdata('id_kelas'));
        }
    }
    public function addTask($kelas)
    {

        // title
        $data['judul'] = 'Detail Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();

        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();

        $id_matpel = $this->db->get_where('user_guru', ['id_user' => $this->session->userdata('id_user')])->row_array();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);
        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));
        // get detail task
        $data['task'] = $this->Guru_model->getDetailTask($kelas);

        $data['id_kelas'] = $kelas;
        // var_dump($this->session->userdata('id_kelas'));
        // die;

        $this->form_validation->set_rules('task', 'Isi', 'required');
        // $countId = $this->Guru_model->getCountDetailTask($kelas);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/guru/guru_header', $data);
            $this->load->view('templates/guru/guru_sidebar', $data);
            $this->load->view('templates/guru/guru_topbar', $data);
            $this->load->view('guru/task', $data);
            $this->load->view('templates/guru/guru_sidebar_r', $data);
            $this->load->view('templates/guru/guru_footer');
        } else {
            // die('here');
            $data = [
                'id_guru' => $this->session->userdata('id_user'),
                'id_matpel' => $id_matpel['id_matpel'],
                'id_kelas' => $kelas,
                'isi' => $this->input->post('task'),
                'judul' => $this->input->post('judul'),
                'created_at' => time()
            ];
            $this->db->insert('post_guru', $data);
            redirect('guru/task_detail/' . $kelas);
        }
    }
    public function editIsi($id_kelas)
    {
        // title
        $data['judul'] = 'Detail Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['id_kelas'] = $id_kelas;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/guru/guru_header', $data);
            $this->load->view('templates/guru/guru_sidebar', $data);
            $this->load->view('templates/guru/guru_topbar', $data);
            $this->load->view('guru/task', $data);
            $this->load->view('templates/guru/guru_footer');
        } else {
            $data = [
                // 'id_guru' => $this->input->post('id_user'),
                'id_post' => $this->input->post('id'),
                'isi' => $this->input->post('isi'),
                'created_at' => time()
            ];
            $this->db->where('id_post', $this->input->post('id'));
            $this->db->update('post_guru', $data);
            redirect('guru/task_detail/' . $id_kelas);
        }
    }
    public function add_comment($id_post)
    {
        // title
        $data['judul'] = 'Detail Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $id_post;
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['id_user'] = $data['user']['id_user_role'];
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get comment
        $data['id'] = $id_post;
        $data['comment'] = $this->Guru_model->getComment($id_post);
        $data['commentMurid'] = $this->Guru_model->getCommentMurid($id_post);
        // $data['comment_murid'] = $this->Guru_model->getCommentMurid($id_post);
        // var_dump($data['comment']);
        // die;
        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/add_comment', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function insertComment($id_post)
    {
        // title
        $data['judul'] = 'Detail Task';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $id_post;
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/guru/guru_header', $data);
            $this->load->view('templates/guru/guru_sidebar', $data);
            $this->load->view('templates/guru/guru_topbar', $data);
            $this->load->view('guru/add_comment', $data);
            $this->load->view('templates/guru/guru_footer');
        } else {
            $data = [
                'id_guru' => $this->input->post('id_user'),
                'id_post' => $this->input->post('id'),
                'isi' => $this->input->post('comment'),
                'created_at' => time()
            ];
            $this->db->insert('comment_guru', $data);
            redirect('guru/add_comment/' . $id_post);
        }
    }
    public function post_tugas($id_post, $id_kelas)
    {
        // title
        $data['judul'] = 'Post Tugas';
        $data['prev'] = 'Detail Task';
        $data['curr'] = 'Post File';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // menu
        $role_id = $this->session->userdata('role_id');
        // $id_kelas = $this->db->get('');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);
        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));
        // get detail task
        $data['task'] = $this->Guru_model->getPost($id_post);
        $data['file'] = $this->Guru_model->getFile($id_post);
        $data['kelas'] = $id_kelas;
        $data['score'] = $this->db->get_where('score', ['id_post' => $id_post])->result_array();
        // var_dump($data['file']);
        // die;

        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/post_file', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function addScore($id_post)
    {
        $data = [
            'score' => $this->input->post('score'),
            'id_kelas' => $this->input->post('kelas'),
            'id_matpel' => $this->session->userdata('id_matpel'),
            'id_post' => $id_post,
        ];
        $this->db->insert('score', $data);
        redirect('guru/post_tugas/' . $id_post . '/' . $data['id_matpel']);
    }
    public function updateScore($id_post)
    {
        $data = [
            'score' => $this->input->post('score'),
            'id_kelas' => $this->input->post('kelas'),
            'id_matpel' => $this->session->userdata('id_matpel')
        ];
        $this->db->where('id_post', $this->input->post('id'));
        $this->db->update('score', $data);
        redirect('guru/post_tugas/' . $id_post . '/' . $data['id_matpel']);
    }
    public function detail_lesson($kelas)
    {
        // title
        $data['judul'] = 'Detail Lesson';
        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        // $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active'), 'role_id' => $this->session->userdata('role_id')])->num_rows();

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Guru_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Guru_model->getDataGuru($this->session->userdata('role_id'));
        // get data detail Lesson
        $matpel = $this->db->get_where('user_guru', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['detail_lesson'] = $this->Guru_model->getDetailLesson($kelas);
        var_dump($data['detail_lesson']);
        die;
        $this->load->view('templates/guru/guru_header', $data);
        $this->load->view('templates/guru/guru_sidebar', $data);
        $this->load->view('templates/guru/guru_topbar', $data);
        $this->load->view('guru/detail_lesson', $data);
        $this->load->view('templates/guru/guru_sidebar_r', $data);
        $this->load->view('templates/guru/guru_footer');
    }
    public function update_pertemuan($kelas)
    {
        $data1 = [
            'buku' => $this->input->post('materi')
        ];
        $data2 = [
            'link' => $this->input->post('link')
        ];

        $this->db->where('id_buku', $this->input->post('id2'));
        $this->db->update('buku', $data1);

        $this->db->where('id_pertemuan', $this->input->post('id1'));
        $this->db->update('pertemuan_guru', $data2);
        redirect('guru/detail_lesson/' . $kelas);
    }
}
