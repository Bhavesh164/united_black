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
        $category = array(
            'categories' => array(),
            'parent_cats' => array()
        );
        $result = $this->db->query('select * from category')->result_array();
        foreach ($result as $row) {
            $category['categories'][$row['category_id']] = $row;
            $category['parent_cats'][$row['parent_id']][] = $row['category_id'];
        }
        $data['category_view'] = $this->buildCategory(0, $category);
        $data['tags'] = $this->tags();
        $this->template('admin/product/add', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
    }
}
