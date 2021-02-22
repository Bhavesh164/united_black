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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "attribute_name" => trim($_REQUEST['attribute_name']),
                "display_name" => trim($_REQUEST['display_name']),
            ];
            if (empty($error)) {
                $table = 'attribute';
                $result = $this->common->insert($fieldvalues, $table);
                $this->session->set_flashdata('success', 'Attribute added successfully');
                redirect('admin/common/create_attribute');
            }
        }
        $this->template('admin/attribute/add');
    }

    public function attributes()
    {
        $orderBy = array('attribute_id' => 'desc');
        $data['attributes'] = $this->common->get_all_rows(false, false, 'attribute', false, $orderBy);
        $this->template('admin/attribute/list', $data);
    }

    public function edit_attribute()
    {
        $attribute_id = $this->uri->segment(4);
        $where = array("attribute_id" => $attribute_id);
        $data['attribute'] = $this->common->get_specified_row($where, false, 'attribute');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "attribute_name" => trim($_REQUEST['attribute_name']),
                "display_name" => trim($_REQUEST['display_name']),
            ];
            if (empty($error)) {
                $table = 'attribute';
                $usingCondition = ['attribute_id' => $attribute_id];
                $this->common->update($fieldvalues, $usingCondition, $table);
                $this->session->set_flashdata('success', 'Attribute updated successfully');
                redirect('admin/common/edit_attribute/' . $attribute_id);
            } else {
                $error = implode("\n", $error);
                $this->session->set_flashdata('error', $error);
                redirect('admin/common/edit_attribute/' . $attribute_id);
            }
        }
        $this->template('admin/attribute/edit', $data);
    }

    public function attribute_values()
    {
        $orderBy = array('attribute_value_id' => 'desc');
        $attribute_id = $this->uri->segment(4);
        $data['attribute_name'] = $this->db->query("select attribute_name from attribute where attribute_id='$attribute_id'")->row()->attribute_name;
        $where = array("attribute_id" => $attribute_id);
        $data['attribute_values'] = $this->common->get_all_rows($where, false, 'attribute_value', false, $orderBy);
        $this->template('admin/attribute_value/list', $data);
    }

    public function attributes_value_add()
    {
        $attribute_id = $this->uri->segment(4);
        $data['attribute_id'] = $attribute_id;
        $data['attribute_name'] = $this->db->query("select attribute_name from attribute where attribute_id='$attribute_id'")->row()->attribute_name;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "attribute_id" => trim($attribute_id),
                "attribute_value" => trim($_REQUEST['attribute_value']),
            ];
            if (empty($error)) {
                $table = 'attribute_value';
                $result = $this->common->insert($fieldvalues, $table);
                $this->session->set_flashdata('success', 'Attribute Value added successfully');
                redirect('admin/common/attributes_value_add/' . $attribute_id);
            }
        }
        $this->template('admin/attribute_value/add', $data);
    }

    public function edit_attribute_value()
    {
        $attribute_value_id = $this->uri->segment(4);

        $where = array("attribute_value_id" => $attribute_value_id);
        $data['attribute_value'] = $this->common->get_specified_row($where, false, 'attribute_value');
        $data['attribute_name'] = $this->db->query("select attribute_name from attribute where attribute_id='{$data['attribute_value']['attribute_id']}'")->row()->attribute_name;
        $this->template('admin/attribute_value/edit', $data);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = [];
            $fieldvalues = [
                "attribute_value" => trim($_REQUEST['attribute_value']),
            ];
            if (empty($error)) {
                $table = 'attribute_value';
                $usingCondition = ['attribute_value_id' => $attribute_value_id];
                $this->common->update($fieldvalues, $usingCondition, $table);
                $this->session->set_flashdata('success', 'Attribute value updated successfully');
                redirect('admin/common/edit_attribute_value/' . $attribute_value_id);
            } else {
                $error = implode("\n", $error);
                $this->session->set_flashdata('error', $error);
                redirect('admin/common/edit_attribute_value/' . $attribute_value_id);
            }
        }
    }
}
