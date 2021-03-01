<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Auth_model', 'auth');
    }

    public function login()
    {
        if (!isset($_SESSION['admin'])) {
            $this->load->view('admin/auth/login');
        } else {
            redirect('admin/profile');
        }
    }

    public function check_login()
    {
        if (isset($_POST['login'])) {
            $username = trim($_REQUEST['username']);
            $password = md5(trim($_REQUEST['password']));
            $table = 'users as u';
            $fields = 'u.user_id,u.email,r.role_id,r.role_name';
            $join = array(
                'left' => array(
                    'user_to_role as ur' => 'u.user_id = ur.user_id',
                    'roles as r' => 'r.role_id = ur.role_id'
                ),
            );
            $where = array('u.username' => $username, 'u.password' => $password);
            $res = $this->auth->get_specified_row($where, $fields, $table, $join);
            if (!empty($res)) {
                $_SESSION['admin']['user_id'] = $res['user_id'];
                $_SESSION['admin']['email'] = $res['email'];
                $_SESSION['admin']['role_id'] = $res['role_id'];
                $_SESSION['admin']['role_name'] = $res['role_name'];
                if (isset($_REQUEST['remember'])) {
                    $this->input->set_cookie('username_remember', $username, 86400 * 30);
                    $this->input->set_cookie('password_remember', trim($_REQUEST['password']), 86400 * 30);
                }
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('error', 'Wrong Username or Password');
                redirect('admin/login');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        redirect("admin/login");
    }
}
