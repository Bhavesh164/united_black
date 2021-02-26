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
        $data['seller'] = $this->get_seller();
        $data['attributes'] = $this->get_attributes();
        $this->template('admin/product/add', $data);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
    }

    public function generate_attribute_list()
    {
        $html = '';
        $attribute_id = $_REQUEST['attribute_id'];
        $attribute_name = $this->db->query("select attribute_name from attribute where attribute_id='$attribute_id'")->row()->attribute_name;
        $attribte_values = $this->get_attribute_values_from_attribute_id($attribute_id);
        $inner_html = '<ul class="list-unstyled">';
        foreach ($attribte_values as $att) {
            $inner_html .= "<li><label><input type='checkbox' checked name=attribute_value_ids[] value='$att->attribute_value_id' data-attribute-name=$att->attribute_value> $att->attribute_value</label></li>";
        }
        $inner_html .= '</ul>';
        $html = "<div class='accordion customAccordian'>
                    <div class='accordion-header clearfix' role='button' data-toggle='collapse' data-target='#panel-body-$attribute_id' aria-expanded='true'>
                    <h4>$attribute_name</h4>
                        <div class='caret-remove'>
                            <span class='down-caret'></span>
                            <input type='hidden' name=attribute_ids[] value=$attribute_id>
                            <a href='javascript:void(0)' class='remove_row delete delete_attribute' data-id='$attribute_id'>Remove</a>
                        </div>
                    </div>
                    <div class='accordion-body collapse' id='panel-body-$attribute_id' data-parent='#accordion'>
                    $inner_html
                    </div>
                </div>";
        echo $html;
    }
}
