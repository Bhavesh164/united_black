<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Product_model', 'product');
    }

    public function add()
    {
        $this->template('admin/product/add');
    }
}
