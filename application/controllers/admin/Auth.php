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
        $this->load->view('admin/auth/login');
    }

    public function check_login()
    {
        if (isset($_POST['login'])) {
            $username = trim($_REQUEST['username']);
            $password = md5(trim($_REQUEST['password']));
            $table = 'users as u';
            $fields = 'u.id,u.email,r.role_id,r.role_name';
            $join = array(
                'left' => array(
                    'user_to_role as ur' => 'u.id = ur.user_id',
                    'roles as r' => 'r.role_id = ur.role_id'
                ),
            );
            $where = array('u.username' => $username, 'u.password' => $password);
            $res = $this->auth->get_specified_row($where, $fields, $table, $join);
            if (!empty($res)) {
                $_SESSION['admin']['user_id'] = $res['id'];
                $_SESSION['admin']['email'] = $res['email'];
                $_SESSION['admin']['role_id'] = $res['role_id'];
                $_SESSION['admin']['role_name'] = $res['role_name'];
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
