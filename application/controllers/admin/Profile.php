<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model', 'profile');
    }

    public function index()
    {
        $table = 'users as u';
        $fields = 'u.*,r.role_id';
        $where = array('u.user_id' => $_SESSION['admin']['user_id']);
        $join = array(
            'inner' => array(
                'user_to_role as ur' => 'u.user_id = ur.user_id',
                'roles as r' => 'r.role_id = ur.role_id'
            ),
        );
        $res['users'] = $this->profile->get_specified_row($where, $fields, $table, $join);
        $this->template('admin/profile/profile', $res);
    }

    public function update()
    {
        $table = 'users';
        $columnToUpdate = array(
            'fname' => trim($_REQUEST['fname']),
            'lname' => trim($_REQUEST['lname']),
            'email' => trim($_REQUEST['email']),
            'username' => trim($_REQUEST['username']),
        );
        if (isset($_REQUEST['password'])) {
            if (!empty($_REQUEST['password'])) {
                $columnToUpdate['password'] = md5(trim($_REQUEST['password']));
            }
        }
        $usingCondition = ['user_id' => $_SESSION['admin']['user_id']];
        $this->profile->update($columnToUpdate, $usingCondition, $table);
        $this->session->set_flashdata('success', 'Profile Updated Successfully');
        redirect("admin/profile");
    }
}
