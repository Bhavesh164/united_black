<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Seller_model', 'seller');
    }

    public function index()
    {
        $orderBy = array('seller_id' => 'desc');
        $fields = array('seller_id', 'concat(fname," ",lname) as name', 'email', 'username', 'address', 'is_active');
        $data['sellers'] = $this->seller->get_all_rows(false, $fields, 'seller', false, $orderBy);
        $this->template('admin/seller/list', $data);
    }

    public function add()
    {
        $data['country'] = $this->country();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = $this->current_date();
            $fieldValues = [
                "username" => trim($_REQUEST['username']),
                "email" => trim($_REQUEST['email']),
                "password" => trim(md5($_REQUEST['password'])),
                "fname" => trim($_REQUEST['fname']),
                "lname" => trim($_REQUEST['lname']),
                "city" => trim($_REQUEST['city']),
                "country_id" => trim($_REQUEST['country_id']),
                "state_id" => trim($_REQUEST['state_id']),
                "zipcode" => trim($_REQUEST['zipcode']),
                "phone_no" => trim($_REQUEST['phone_no']),
                "address" => trim($_REQUEST['address']),
                "gender" => trim($_REQUEST['gender']),
                "business_reg_no" => trim($_REQUEST['business_reg_no']),
                "vat_file" => trim($_REQUEST['vat_file']),
                "vat_registered" => trim($_REQUEST['vat_registered']),
                "seller_vat" => trim($_REQUEST['seller_vat']),
                "company_name" => trim($_REQUEST['company_name']),
                "bank_name" => trim($_REQUEST['bank_name']),
                "bank_code" => trim($_REQUEST['bank_code']),
                "iban" => trim($_REQUEST['iban']),
                "bank_info" => trim($_REQUEST['bank_info']),
                "account_no" => trim($_REQUEST['account_no']),
                "bvn_number" => trim($_REQUEST['bvn_number']),
                "shop_name" => trim($_REQUEST['shop_name']),
                "account_name" => trim($_REQUEST['account_name']),
                "created_on" => $date,
                "updated_on" => $date,
            ];

            if (isset($_REQUEST['is_active'])) {
                if ($_REQUEST['is_active'] == 'on') {
                    $fieldValues['is_active'] = '1';
                } else {
                    $fieldValues['is_active'] = '0';
                }
            } else {
                $fieldValues['is_active'] = '0';
            }

            if (!empty($_FILES['image'])) {
                $upload_path = 'uploads/seller/';
                $upload = $this->upload_image('image', $upload_path);
                if ($upload) {
                    if ($upload['status'] == 1) {
                        $fieldValues['cov_picture'] = $upload['filename'];
                    }
                }
            }

            $table = 'seller';
            $result = $this->seller->insert($fieldValues, $table);
            $this->session->set_flashdata('success', 'Seller added successfully');
            redirect('admin/seller/add');
        }
        $this->template('admin/seller/add', $data);
    }

    public function edit()
    {
        $data['country'] = $this->country();
        $seller_id = $this->uri->segment(4);
        $where = array("seller_id" => $seller_id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = $this->current_date();
            $fieldValues = [
                "username" => trim($_REQUEST['username']),
                "email" => trim($_REQUEST['email']),
                "fname" => trim($_REQUEST['fname']),
                "lname" => trim($_REQUEST['lname']),
                "city" => trim($_REQUEST['city']),
                "country_id" => trim($_REQUEST['country_id']),
                "state_id" => trim($_REQUEST['state_id']),
                "zipcode" => trim($_REQUEST['zipcode']),
                "phone_no" => trim($_REQUEST['phone_no']),
                "address" => trim($_REQUEST['address']),
                "gender" => trim($_REQUEST['gender']),
                "business_reg_no" => trim($_REQUEST['business_reg_no']),
                "vat_file" => trim($_REQUEST['vat_file']),
                "vat_registered" => trim($_REQUEST['vat_registered']),
                "seller_vat" => trim($_REQUEST['seller_vat']),
                "company_name" => trim($_REQUEST['company_name']),
                "bank_name" => trim($_REQUEST['bank_name']),
                "bank_code" => trim($_REQUEST['bank_code']),
                "iban" => trim($_REQUEST['iban']),
                "bank_info" => trim($_REQUEST['bank_info']),
                "account_no" => trim($_REQUEST['account_no']),
                "bvn_number" => trim($_REQUEST['bvn_number']),
                "shop_name" => trim($_REQUEST['shop_name']),
                "account_name" => trim($_REQUEST['account_name']),
                "created_on" => $date,
                "updated_on" => $date,
            ];
            if (trim($_REQUEST['password']) != '') {
                $fieldValues['password'] = trim(md5($_REQUEST['password']));
            }
            if (isset($_REQUEST['is_active'])) {
                if ($_REQUEST['is_active'] == 'on') {
                    $fieldValues['is_active'] = '1';
                } else {
                    $fieldValues['is_active'] = '0';
                }
            } else {
                $fieldValues['is_active'] = '0';
            }

            if (!empty($_FILES['image'])) {
                $upload_path = 'uploads/seller/';
                $upload = $this->upload_image('image', $upload_path);
                if ($upload) {
                    if ($upload['status'] == 1) {
                        $this->delete_image($upload_path, $data['seller']['cov_picture']);
                        $fieldValues['cov_picture'] = $upload['filename'];
                    }
                }
            }
            $table = 'seller';
            $usingCondition = ['seller_id' => $seller_id];
            $this->seller->update($fieldValues, $usingCondition, $table);
            $this->session->set_flashdata('success', 'Seller updated successfully');
            redirect('admin/seller/edit/' . $seller_id);
        }
        $data['seller_detail'] = $this->seller->get_specified_row($where, false, 'seller');
        $data['states'] = $this->db->query("select * from state where country_id='{$data['seller_detail']['country_id']}'")->result();
        $this->template('admin/seller/edit', $data);
    }
}
