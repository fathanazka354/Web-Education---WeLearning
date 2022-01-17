<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Auth_model");
        // $this->load->model("Auth_model");
    }
    public function index()
    {
        $data['judul'] = "Login";
        // var_dump(get_cookie('id_user'));
        // die();

        // if ($this->session->userdata('nis')) {
        //     redirect('murid/index');
        // }
        $this->load->view('Templates/Auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('Templates/Auth_footer');
    }

    public function masuk()
    {
        $data['judul'] = "Login";
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        // $this->_validate();

        if ($this->form_validation->run() == false) {
            $this->load->view('Templates/Auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('Templates/Auth_footer');
            // die('here');
        } else {
            $nis = $this->input->post('nis');
            $user = $this->db->get_where('user_db', ['nis' => $nis])->row_array();
            $this->Auth_model->updateIsActive($user['id_user_role']);
            $this->_validate();
            // $this->_login();
            // die('here');
        }
    }

    private function _validate()
    {
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        // die('here');
        if ($captcha_response != '') {
            $keySecret = '6LfZfu0dAAAAAI_KzeRvxWtw60CL4CF-KRjN7Uu-';

            $check = [
                'secret' => $keySecret,
                'response' => $this->input->post('g-recaptcha')
            ];

            $startProccess = curl_init();

            curl_setopt($startProccess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

            curl_setopt($startProccess, CURLOPT_URL, true);

            curl_setopt($startProccess, CURLOPT_POSTFIELDS, http_build_query($check));

            curl_setopt($startProccess, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($startProccess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startProccess);

            $finalResponse = json_decode($receiveData, true);

            $this->_login();
            // if ($finalResponse['success']) {
            // } else {
            //     $this->session->set_flashdata('mess', 'Validation Fail Try Again');
            //     redirect('auth');
            // }
        } else {
            $this->session->set_flashdata('message', 'Validation Fail Try Again!');
            redirect('auth');
        }
    }

    private function _login()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user_db', ['nis' => $nis])->row_array();
        $user_guru = $this->Auth_model->getDataLoginGuru($nis);
        $user_murid = $this->db->get_where('user_murid', ['id_user' => $user['id_user_role']])->row_array();

        if ($user) {
            // var_dump($user);

            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    // $this->_validate();
                    // $updateHasil = $this->Auth_model->getData($user['id_user_role']);
                    // die('here');
                    $is_active = $user['is_active'];
                    // var_dump($updateHasil);
                    // die('here');

                    $data = [
                        'nis' => $user['nis'],
                        'id_user' => $user['id_user_role'],
                        'role_id' => $user['role_id'],
                        'id_kelas' => $user_murid['id_kelas'],
                        'id_matpel' => $user_guru['id_matpel'],
                        'is_active' => $is_active,
                    ];
                    // $cookie = [
                    //     'name' => 'nis',
                    //     'value' => $user['nis'],
                    //     'expire' => '3000',
                    //     'secure' => TRUE
                    // ];
                    // $cookie2 = [
                    //     'name' => 'id_user',
                    //     'value' => $user['id_user_role'],
                    //     'expire' => '3000',
                    //     'secure' => TRUE
                    // ];
                    // $cookie3 = [
                    //     'name' => 'role_id',
                    //     'value' => $user['role_id'],
                    //     'expire' => '3000',
                    //     'secure' => TRUE
                    // ];
                    $this->session->set_userdata($data);
                    // set_cookie($cookie);
                    // set_cookie($cookie2);
                    // set_cookie($cookie3);
                    // $this->Auth_model->isActive($user['id_user_role']);

                    $this->goToDefaultPage();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						The password / nip have not active!
					</div>');
                    redirect('auth', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						The account have not been activated!
					</div>');
                redirect('auth', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						The account have not been created!
					</div>');
            redirect('auth', 'refresh');
        }
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('guru');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('murid');
        } else {
            // jika ada role_id yg lain maka tambahkan disini
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Sign Up";
            $this->load->view('Templates/Auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('Templates/Auth_footer');
            // die('here');
        }
    }

    public function addData()
    {

        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Sign Up";
            $this->load->view('Templates/Auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('Templates/Auth_footer');
            // die('here');
        } else {
            // die('here');
            $this->Auth_model->addDataAuth();
            redirect('auth');
        }
        // die('here');
    }

    public function logout()
    {
        delete_cookie('id_user');
        $nis = $this->session->userdata('nis');
        $user = $this->db->get_where('user_db', ['nis' => $nis])->row_array();
        $this->Auth_model->updateNonActive($user['id_user_role']);
        unset($_SESSION['nis']);
        unset($_SESSION['role_id']);
        // var_dump(get_cookie('id_user'));
        // die();
        // $cookie =
        //     [
        //         'name' => 'nis',
        //         'value' => '',
        //         'expire' => '0',
        //         'secure' => TRUE
        //     ];
        // $cookie2 = [
        //     'name' => 'id_user',
        //     'value' => '',
        //     'expire' => '0',
        //     'secure' => TRUE
        // ];
        // $cookie3 =  [
        //     'name' => 'role_id',
        //     'value' => '',
        //     'expire' => '0',
        //     'secure' => TRUE
        // ];

        // delete_cookie($cookie);
        // delete_cookie($cookie2);
        // delete_cookie($cookie3);
        // $nis = $user['nis'];
        // unset($_SESSION['status']);
        unset($_SESSION['id_user']);
        redirect('Auth', 'refresh');
    }
}
