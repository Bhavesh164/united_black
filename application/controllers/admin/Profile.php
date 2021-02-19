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
            'first_name' => trim($_REQUEST['first_name']),
            'last_name' => trim($_REQUEST['last_name']),
            'email' => trim($_REQUEST['email']),
            'username' => trim($_REQUEST['username']),
        );
        if (isset($_REQUEST['password'])) {
            if (!empty($_REQUEST['password'])) {
                $columnToUpdate['password'] = md5(trim($_REQUEST['password']));
            }
        }

        if ($_SESSION['admin']['role_id'] == 2) {
            $columnToUpdate['company_email'] = $_REQUEST['company_email'];
            $columnToUpdate['company_phone'] = $_REQUEST['company_phone'];
            $columnToUpdate['company_address'] = $_REQUEST['company_address'];
        } else {
            $columnToUpdate['company_email'] = '';
            $columnToUpdate['company_phone'] = '';
            $columnToUpdate['company_address'] = '';
        }
        if ($_SESSION['admin']['role_id'] == 2) {
            if (!empty($_FILES['company_logo']['name'])) {
                if (!file_exists("uploads/company_logos/thumb")) {
                    mkdir("uploads/company_logos/thumb", 0777, true);
                }
                $file_name = time() . $_FILES["company_logo"]['name'];
                $config = array();
                $config['upload_path'] = FCPATH . '/uploads/company_logos/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('company_logo')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $columnToUpdate['company_logo'] = $this->upload->data()['file_name'];
                    //*create thumbnail //
                    $thumb = array();
                    $thumb['image_library'] = 'gd2';
                    $thumb['source_image'] = FCPATH . '/uploads/company_logos/' . $file_name;
                    $thumb['new_image'] = FCPATH . '/uploads/company_logos/thumb/'; // path where you want to save thumnail
                    $thumb['create_thumb'] = TRUE;
                    $thumb['thumb_marker'] = '';
                    $thumb['maintain_ratio'] = TRUE;
                    $thumb['width']         = 300;
                    $thumb['height']       = 300;
                    $this->load->library('image_lib', $thumb);
                    $this->image_lib->initialize($thumb);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    //create thumbanil
                }
            }
        }

        $usingCondition = ['id' => $_SESSION['admin']['user_id']];
        $this->profile->update($columnToUpdate, $usingCondition, $table);
        $this->session->set_flashdata('success', 'Profile Updated Successfully');
        redirect("admin/profile");
    }
}
