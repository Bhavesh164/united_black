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
        echo "working";
    }

    public function add()
    {
        $data['country'] = $this->country();
        $this->template('admin/seller/add', $data);
    }

    public function edit()
    {
        echo "working";
    }
}
