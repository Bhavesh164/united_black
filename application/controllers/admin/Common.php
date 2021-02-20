<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Common_model', 'common');
    }

    public function categories()
    {
        $orderBy = array('category_id' => 'desc');
        $data['categories'] = $this->common->get_all_rows(false, false, 'category', false, $orderBy);
        $this->template('admin/category/list', $data);
    }
    public function create_category()
    {
        $data['category_tree'] = $this->getCategoryTree();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "name" => trim($_REQUEST['category_name']),
                "description" => trim($_REQUEST['category_description']),
                "parent_id" => trim($_REQUEST['parent_id']),
            ];
            if (trim($_REQUEST['category_slug']) != '') {
                $slug = $this->slugify($_REQUEST['category_slug']);
            } else {
                $slug = $this->slugify($_REQUEST['category_name']);
            }
            if ($this->check_unique_category_slug($slug)) {
                $fieldvalues['slug'] = $slug;
            } else {
                $error[] = 'Slug is not unique';
            }
            if (empty($error)) {
                if (!empty($_FILES['image'])) {
                    $upload_path = 'uploads/categories/';
                    $upload = $this->upload_image('image', $upload_path);
                    if ($upload) {
                        if ($upload['status'] == 1) {
                            $fieldvalues['cat_image'] = $upload['filename'];
                        }
                    }
                }
            }
            if (empty($error)) {
                $table = 'category';
                $result = $this->common->insert($fieldvalues, $table);
                $this->session->set_flashdata('success', 'Category added successfully');
                redirect('admin/common/create_category');
            } else {
                $error = implode("\n", $error);
                $this->session->set_flashdata('error', $error);
                redirect('admin/common/create_category');
            }
        }
        $this->template('admin/category/add', $data);
    }
    public function edit_category()
    {
        $data['category_tree'] = $this->getCategoryTree();
        $category_id = $this->uri->segment(4);
        $where = array("category_id" => $category_id);
        $data['category'] = $this->common->get_specified_row($where, false, 'category');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "name" => trim($_REQUEST['category_name']),
                "description" => trim($_REQUEST['category_description']),
                "parent_id" => trim($_REQUEST['parent_id']),
            ];
            if (trim($_REQUEST['category_slug']) != '') {
                $slug = $this->slugify($_REQUEST['category_slug']);
            } else {
                $slug = $this->slugify($_REQUEST['category_name']);
            }
            if ($this->check_unique_category_slug($slug, $category_id)) {
                $fieldvalues['slug'] = $slug;
            } else {
                $error[] = 'Slug is not unique';
            }
            if (empty($error)) {
                if (!empty($_FILES['image'])) {
                    $upload_path = 'uploads/categories/';
                    $upload = $this->upload_image('image', $upload_path);
                    if ($upload) {
                        if ($upload['status'] == 1) {
                            $this->delete_image($upload_path, $data['category']['cat_image']);
                            $fieldvalues['cat_image'] = $upload['filename'];
                        }
                    }
                }
            }
            if (empty($error)) {
                $table = 'category';
                $usingCondition = ['category_id' => $category_id];
                $this->common->update($fieldvalues, $usingCondition, $table);
                $this->session->set_flashdata('success', 'Category updated successfully');
                redirect('admin/common/edit_category/' . $category_id);
            } else {
                $error = implode("\n", $error);
                $this->session->set_flashdata('error', $error);
                redirect('admin/common/edit_category/' . $category_id);
            }
        }
        $this->template('admin/category/edit', $data);
    }

    public function create_attribute()
    {
    }
}
