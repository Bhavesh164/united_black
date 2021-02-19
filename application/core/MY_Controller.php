<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function template($view, $data = '')
    {
        if ($data == '') {
            $data = [];
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function check_email_exist($email)
    {
        $res = $this->db->query("select user_id from users where email='{$email}'")->result();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function check_username_exist($username)
    {
        $res = $this->db->query("select username from users where username='{$username}'")->result();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function roles()
    {
        $res = [];
        $res = $this->db->query("select role_id,role_name from roles")->result();
        return $res;
    }

    public function check_email()
    {
        if (isset($_REQUEST['email_orig'])) {
            if (trim($_REQUEST['email_orig']) == trim($_REQUEST['email'])) {
                echo "true";
                die;
            }
        }
        $table = 'users';
        $fields = 'id';
        $where = array('email' => $_REQUEST['email']);
        $res = $this->user->get_specified_row($where, $fields, $table);
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function check_username()
    {
        if (isset($_REQUEST['username_orig'])) {
            if (trim($_REQUEST['username_orig']) == trim($_REQUEST['username'])) {
                echo "true";
                die;
            }
        }
        $table = 'users';
        $fields = 'user_id';
        $where = array('username' => $_REQUEST['username']);
        $res = $this->user->get_specified_row($where, $fields, $table);
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function get_user_fullname($user_id)
    {
        $fullname = $this->db->select('concat(u.first_name," ",u.last_name) as fullname')
            ->get_where('users u', array('user_id' => $user_id))
            ->row()
            ->fullname;
        return $fullname;
    }



    public function get_day_in_number()
    {
        $date = date('Y-m-d H:i:s');
        $weekday = date('l', strtotime($date));
        if ($weekday == 'Sunday') {
            return 0;
        } else if ($weekday = 'Monday') {
            return 1;
        } else if ($weekday = 'Tuesday') {
            return 2;
        } else if ($weekday = 'Wednesday') {
            return 3;
        } else if ($weekday = 'Thursday') {
            return 4;
        } else if ($weekday = 'Friday') {
            return 5;
        } else if ($weekday = 'Saturday') {
            return 6;
        }
    }
}
