<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Murid_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $id = $data['user']['id_user_role'];
        $data['jml_user_login'] = $this->db->get_where('user_db', ['is_active' => $this->session->userdata('is_active')])->num_rows();
        // var_dump($this->session->userdata('nis'));
        // var_dump($data['user']);

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        // history
        if (array_key_exists('id_user', $_COOKIE)) {
            $coockie_get = get_cookie('id_user');
            $coockieeres = unserialize($coockie_get);
            $id_matpel = implode("','", $coockieeres);
            // if ($coockieeres == $data['user']['id_matpel'])

            $where = "b.id_matpel IN ('$id_matpel')";
            $data['history'] = $this->Murid_model->getAllHistory($where);
            // var_dump($data['history']);
            // die();
        }

        // $data['choosen_lesson'] = $this->Murid_model->getDataBuku($id);
        $data['todo_completed'] = $this->Murid_model->getTodoCompleted($data['user']['id_user_role']);
        $data['todo_inprogress'] = $this->Murid_model->getTodoInproses($data['user']['id_user_role']);
        $data['todo_missing'] = $this->Murid_model->getTodoMissing($data['user']['id_user_role']);
        $data['user_login'] = $this->Murid_model->getDataLogin();
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        // $data['buku'] = $this->Murid_model->getBuku($id);
        // var_dump($data['murid']);
        $data['judul'] = 'Dashboard';
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/index', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $kd_kelas['kelas'] = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['profile'] = $this->Murid_model->getDataProfile($data['user']['id_user_role']);
        $data['jml_kelas'] = $this->Murid_model->jmlKelas();
        // $data['jml_negara'] = $this->Murid_model->getNegara();
        // var_dump($kd_kelas['kelas']['id_kelas']);
        // die();
        $data['guru'] = $this->Murid_model->getDataGuru($data['user']['id_user_role']);
        // var_dump($data['jml_kelas']);
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        $data['judul'] = 'Profile';

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/profile', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function updateProfile()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('id_user')])->row_array();
        // $data['profile'] = $this->Murid_model->getDataProfile($data['user']['id_user_role']);
        // $dat = ['negara' => $this->input->post('negara')];
        $data['jml_kelas'] = $this->Murid_model->jmlKelas();
        $data['judul'] = 'Edit Data';
        // $data['jml_negara'] = $this->Murid_model->getNegara();
        // var_dump($data['jml_negara']);
        // die;
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
            $this->db->where('nis', $this->session->userdata('nis'));
            $this->db->update('user_db');

            redirect('murid/profile');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message_err', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('murid/changePassword');
                die('here');
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
                    redirect('murid/profile');
                }
            }
            redirect('murid/profile');
        }
    }
    public function changePassword()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['profile'] = $this->Murid_model->getDataProfile($data['user']['id_user_role']);
        $dat = ['negara' => $this->input->post('negara')];
        $data['jml_kelas'] = $this->Murid_model->jmlKelas();
        $data['judul'] = 'Edit Data';
        $data['jml_negara'] = $this->Murid_model->getNegara($data['user']['id_user_role']);
        $data['negara'] = $this->db->get('negara')->result_array();
        // var_dump($data['negara']);
        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar');
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/change_password', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }


    public function schedule()
    {
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $id = $data['user']['id_user_role'];
        // $data['choosen_lesson'] = $this->Murid_model->getDataBuku($data['user']['id_user_role']);
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();


        // history
        if (array_key_exists('id_user', $_COOKIE)) {
            $coockie_get = get_cookie('id_user');
            $coockieeres = unserialize($coockie_get);
            $id_matpel = implode("','", $coockieeres);
            // if ($coockieeres == $data['user']['id_matpel'])

            $where = "b.id_matpel IN ('$id_matpel')";
            $data['history'] = $this->Murid_model->getAllHistory($where);
            // var_dump($data['history']);
            // die();
        }

        $kelas = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $data['buku'] = $this->Murid_model->getBuku($kelas['id_kelas']);
        $data['buku_online'] = $this->Murid_model->getBukuOnline($kelas['id_kelas']);
        // var_dump($data['buku']);
        // die();
        $data['judul'] = 'Schedule';
        // $this->_userLogin();
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        // die();
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/schedule', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function teacher()
    {
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $kd_kelas['kelas'] = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        // var_dump($kd_kelas['kelas']['id_kelas']);
        // die();
        $data['guru'] = $this->Murid_model->getDataGuru($data['user']['id_user_role']);
        $data['judul'] = 'Teacher';

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar', $data);
        $this->load->view('murid/teacher', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function lesson()
    {
        // ambil kd kelas
        $kd_kelas = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // user
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();

        // pilih lesson
        $data['choosen_lesson'] = $this->Murid_model->getDataBuku($kd_kelas['id_kelas']);
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));

        // get data all matpel berdasarkan id kelas
        $data['buku'] = $this->Murid_model->getLesson($this->session->userdata('id_kelas'));

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        $data['judul'] = 'Lesson';
        // var_dump($data['guru']);
        // die();

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar');
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/lesson', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function detailLesson($id_lesson)
    {

        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        $data['judul'] = 'Lesson';

        $data['judul'] = 'Detail Lesson';

        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $kd_kelas['kelas'] = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // presensi
        // $data['presensi'] = $this->Murid_model->getPresensi($id_matpel);
        // $data['jml_presensi'] = $this->db->get('pertemuan')->num_rows();

        $data['detail_lesson'] = $this->Murid_model->getDetailLesson($id_lesson);
        $data['pengumuman'] = $this->Murid_model->getPengumuman($id_lesson);
        $id = $this->db->get_where('lesson_murid', ['id_lesson_murid' => $id_lesson])->row_array();
        // $data['matpel'] = $this->Murid_model->getMatpel($id_lesson);
        // update cookie history
        if (array_key_exists('id_user', $_COOKIE)) {
            $cookie_get = get_cookie('id_user');
            $cookieres = unserialize($cookie_get);
            if (!in_array($id['id_matpel'], $cookieres)) {
                $cookieres[] = $id['id_matpel'];
            }
            delete_cookie('id_user');
            $cookie_value = serialize($cookieres);
            $data_cookie = [
                'name' => 'id_user',
                'value' => $cookie_value,
                'expire' => '300',
                'secure' => TRUE
            ];
            $this->input->set_cookie($data_cookie);
            // if()
            // var_dump($cookieres);
            // die;
        } else {
            $arr_cookie[] = $id['id_matpel'];
            $cookie_value = serialize($arr_cookie);
            $data_cookie = [
                'name' => 'id_user',
                'value' => $cookie_value,
                'expire' => '3000',
                'secure' => TRUE
            ];
            $this->input->set_cookie($data_cookie);
        }
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/detail_lesson', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function presensi()
    {
        $data['judul'] = 'Presensi';
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['mata_pelajaran'] = $this->db->get('matpel')->result_array();
        $data['get_kelas'] = $this->Murid_model->getKelas($this->session->userdata('id_user'));
        $data['presensi'] = $this->db->get('presensi')->result_array();


        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        // var_dump($data['get_kelas']);
        // die();
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar', $data);
        $this->load->view('murid/presensi', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function tambahPresensi()
    {
        $data['judul'] = 'Presensi';
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/murid/user_murid_header', $data);
            $this->load->view('templates/murid/user_murid_sidebar');
            $this->load->view('templates/murid/user_murid_topbar');
            $this->load->view('murid/presensi', $data);
            $this->load->view('templates/murid/user_murid_footer');
        } else {
            $this->Murid_model->tambahPresensi($this->session->userdata('id_user'));
            redirect('murid/presensi');
        }
    }

    public function task()
    {
        $data['judul'] = 'Task';
        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        $kd_kelas = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();


        $data['task'] = $this->Murid_model->getTask($kd_kelas['id_kelas']);
        // var_dump($data['task']);
        // die();
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar');
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/task', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function task_detail($id_matpel)
    {
        $data['prev'] = 'Detail Task';
        $data['judul'] = 'Task';
        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();
        // $kd_matpel = $this->db->get_where('user_murid', ['id_user' => $this->session->userdata('id_user')])->row_array();


        $data['task'] = $this->Murid_model->getDetailTask($id_matpel);
        // var_dump($data['detail_task']);
        // $data['task'] = $this->Murid_model->getTask($data['user']['id_user_role']);
        // die();
        // menu
        // if ($data['detail_task']['id_detail_task'])
        $data['id_matpel'] = $id_matpel;
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar');
        $this->load->view('templates/murid/user_murid_topbar');
        $this->load->view('murid/task_detail', $data);
        $this->load->view('templates/murid/user_murid_sidebar_r', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }
    public function post_tugas($id_post, $id_matpel)
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
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);
        // get data all guru
        $data['guru'] = $this->Murid_model->getAllGuru($this->session->userdata('role_id'));
        $data['id_matpel'] = $id_matpel;
        $data['id_post'] = $id_post;
        // get detail task
        $data['task'] = $this->Murid_model->getPost($id_post);
        $data['file'] = $this->Murid_model->getFile($id_post);
        $data['id'] = $this->db->get_where('post_file', ['id_post' => $id_post])->row_array();
        $data['score'] = $this->db->get_where('score', ['id_post' => $id_post])->row_array();
        // var_dump($data['id']);
        // var_dump($id_post);
        // die;

        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar', $data);
        $this->load->view('murid/post_file', $data);
        $this->load->view('templates/murid/user_murid_footer');
    }

    public function addTugas($id_post, $id_matpel)
    {
        // die('here_add');
        // title
        $data['judul'] = 'Post Tugas';
        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();

        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Murid_model->getAllGuru($this->session->userdata('role_id'));

        $data['id_matpel'] = $id_matpel;
        $data['id_post'] = $id_post;


        // var_dump($this->session->userdata());
        // die('here');
        $this->form_validation->set_rules('file', 'FILE', 'required');

        $file = $_FILES['file']['name'];
        $config['upload_path']          = './assets/file/';
        $config['allowed_types']        = 'pdf|doc|xls';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            // die('here_error');
            redirect('murid/post_tugas/' . $id_post . '/' . $id_matpel);
        } else {
            // die('here_success');
            // die('here');
            $data = array('upload_data' => $this->upload->data());


            $upload = [
                'nama_file' => $file,
                'id_post' => $id_post,
                'id_murid' => $this->session->userdata('id_user'),
                'is_late' => 1,
                'created_at' => time(),
            ];
            $this->db->insert('post_file', $upload);
            redirect('murid/post_tugas/' . $id_post . '/' . $id_matpel);
        }
    }
    public function deleteTugas($id_post, $id_matpel)
    {
        // var_dump($id);
        // die('here_delete');
        // title
        $data['judul'] = 'Post Tugas';
        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();

        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        // get data all guru
        $data['guru'] = $this->Murid_model->getAllGuru($this->session->userdata('role_id'));

        $data['id_matpel'] = $id_matpel;
        $data['id_post'] = $id_post;


        // $this->form_validation->set_rules('file', 'FILE', 'required');

        $file = $this->db->get_where('post_file', ['id_post' => $id_post])->row_array();
        $config = './assets/file/' . $file['nama_file'];
        // var_dump($config);
        // var_dump($file['nama_file']);
        // die('here');

        // $this->load->library('upload', $config);

        if (unlink($config)) {
            $this->db->where('id_post', $id_post);
            $this->db->delete('post_file');
            // die('here_error');
            redirect('murid/post_tugas/' . $id_post . '/' . $id_matpel);
        } else {
            // echo 'gagal';
            die('gagal');
            redirect('murid/post_tugas/' . $id_post . '/' . $id_matpel);
        }
    }
    public function add_comment($id_post)
    {
        // title
        $data['judul'] = 'Comment';
        // user
        $data['murid'] = $this->Murid_model->getAllMurid($this->session->userdata('role_id'));
        $data['user_login'] = $this->Murid_model->getDataLogin($this->session->userdata('nis'));
        // $id = $data['user']['id_user_role'];
        $data['jml_murid'] = $this->db->get('user_murid')->num_rows();
        $data['jml_user_login'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->num_rows();
        $data['user'] = $this->db->get_where('user_db', ['nis' => $this->session->userdata('nis')])->row_array();

        // die;
        // menu
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        $data['id_user'] = $data['user']['id_user_role'];

        // get data all guru
        $data['guru'] = $this->Murid_model->getAllGuru($this->session->userdata('role_id'));
        // get comment
        $data['id'] = $id_post;
        $data['comment'] = $this->Murid_model->getCommentMurid($id_post);
        $data['comment_guru'] = $this->Murid_model->getComment($id_post);


        // redirect('murid/post_tugas');
        // if ($this->form_validation->run() == false) {
        $this->load->view('templates/murid/user_murid_header', $data);
        $this->load->view('templates/murid/user_murid_sidebar', $data);
        $this->load->view('templates/murid/user_murid_topbar', $data);
        $this->load->view('murid/add_comment', $data);
        $this->load->view('templates/murid/user_murid_footer');
        // } else {
        // }
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
        $data['menu'] = $this->Murid_model->getAllMenu($role_id);

        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/murid/user_murid_header', $data);
            $this->load->view('templates/murid/user_murid_sidebar', $data);
            $this->load->view('templates/murid/user_murid_topbar', $data);
            $this->load->view('murid/add_comment', $data);
            $this->load->view('templates/murid/user_murid_footer');
        } else {
            $data = [
                'id_murid' => $this->input->post('id_user'),
                'id_post' => $this->input->post('id'),
                'isi' => $this->input->post('comment'),
                'created_at' => time()
            ];
            $this->db->insert('comment_murid', $data);
            redirect('murid/add_comment/' . $id_post);
        }
    }
}
