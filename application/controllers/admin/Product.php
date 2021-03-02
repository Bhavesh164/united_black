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
            // echo "<pre>";
            // print_R($_REQUEST);
            // die;
            $product_name = trim($_REQUEST['product_name']);
            $slug = $this->slugify($product_name);
            if ($this->check_unique_product_slug($slug)) {
                $slug = $slug;
            } else {
                $slug = $slug . "-1";
            }
            $short_description = trim($_REQUEST['short_description']);
            $long_description = trim($_REQUEST['long_description']);
            $product_type = trim($_REQUEST['product_type']);
            $regular_price = trim($_REQUEST['regular_price']);
            $sale_price = trim($_REQUEST['sale_price']);
            $sku = trim($_REQUEST['simple_sku']);
            $quantity = trim($_REQUEST['simple_stock_quantity']);
            $shipping_weight = trim($_REQUEST['shipping_weight']);
            $shipping_length = trim($_REQUEST['shipping_length']);
            $shipping_width = trim($_REQUEST['shipping_width']);
            $shipping_height = trim($_REQUEST['shipping_height']);
            $product_status = trim($_REQUEST['product_status']);
            $seller_id = trim($_REQUEST['seller_id']);
            $meta_title = trim($_REQUEST['meta_title']);
            $meta_description = trim($_REQUEST['meta_description']);
            $meta_keywords = trim(implode(",", $_REQUEST['meta_keywords']));
            if (!empty($_FILES['product_image'])) {
                $upload_path = 'uploads/products/';
                $upload = $this->upload_image('product_image', $upload_path);
                if ($upload) {
                    if ($upload['status'] == 1) {
                        $product_image = $upload['filename'];
                    }
                }
            } else {
                $product_image = '';
            }
            $created_on = date("Y-m-d H:i:s");
            $fieldValues = [
                "product_name" => $product_name,
                "slug" => $slug,
                "short_description" => $short_description,
                "long_description" => $long_description,
                "meta_title" => $meta_title,
                "meta_description" => $meta_description,
                "meta_keywords" => $meta_keywords,
                "seller_id" => $seller_id,
                "sku" => $sku,
                "quantity" => $quantity,
                "regular_price" => $regular_price,
                "sale_price" => $sale_price,
                "product_type" => $product_type,
                "active" => $product_status,
                "product_image" => $product_image,
                "shipping_weight" => $shipping_weight,
                "shipping_length" => $shipping_length,
                "shipping_width" => $shipping_width,
                "shipping_height" => $shipping_height,
                "created_on" => $created_on,
                "updated_on" => $created_on,
            ];
            $table = 'products';
            $result = $this->product->insert($fieldValues, $table);
            $product_id = $this->db->insert_id();
            if ($product_type == 1) {
                //variations
                if (isset($_REQUEST['variable_regular_price'])) {
                    $variable_regular_price_data = $_REQUEST['variable_regular_price'];
                    foreach ($variable_regular_price_data as $key => $value) {
                        $product_attribute_array = [
                            "product_id" => $product_id,
                            "seller_id" => $seller_id,
                            "default_on" => '0',
                            "sku" => trim($_REQUEST['variable_sku_price'][$key]),
                            "quantity" => trim($_REQUEST['variable_quantity_price'][$key]),
                            "regular_price" => trim($_REQUEST['variable_regular_price'][$key]),
                            "sale_price" => trim($_REQUEST['variable_sale_price'][$key]),
                        ];
                        $product_attribute_ids[] = $this->add_product_attributes($product_attribute_array);
                    }
                }
                if (isset($product_attribute_ids)) {
                    $attribute_ids = array_keys($_REQUEST['attribute']);
                    foreach ($attribute_ids as $ids) {
                        foreach ($_REQUEST['attribute'][$ids] as $key => $value) {
                            $product_attribute_combination_array = [
                                "product_attribute_id" => $product_attribute_ids[$key],
                                "attribute_id" => $ids,
                                "attribute_value_id" => $value,
                            ];
                            $this->add_product_attribute_combination($product_attribute_combination_array);
                        }
                    }
                }

                //product caetgories
                if (isset($_REQUEST['category'])) {
                    foreach ($_REQUEST['category'] as $key => $value) {
                        $categories = [
                            "category_id" => $value,
                            "product_id" => $product_id
                        ];
                        $this->add_product_categories($categories);
                    }
                }

                //product tags
                if (isset($_REQUEST['product_tags'])) {
                    foreach ($_REQUEST['product_tags'] as $key => $value) {
                        $tags = [
                            "tag_id" => $value,
                            "product_id" => $product_id
                        ];
                        $this->add_product_tag($tags);
                    }
                }

                //product gallery images
                if (!empty($_FILES['product_gallery']['name'][0])) {
                    $upload_path = 'uploads/product_gallery/';
                    $upload = $this->upload_images($_FILES['product_gallery'], $upload_path);
                    if ($upload) {
                        if ($upload['status'] == 1) {
                            $product_images = $upload['filename'];
                            $this->add_product_gallery_images($product_id, $product_images);
                        }
                    }
                }
            }
        }
    }

    private function add_product_attributes($data)
    {
        $table = 'product_attribute';
        $result = $this->product->insert($data, $table);
        $product_attribute_id = $this->db->insert_id();
        return $product_attribute_id;
    }

    private function add_product_attribute_combination($data)
    {
        $table = 'product_attribute_combination';
        $result = $this->product->insert($data, $table);
        $product_attribute_combination_id = $this->db->insert_id();
        return $product_attribute_combination_id;
    }

    private function add_product_categories($data)
    {
        $table = 'product_category';
        $result = $this->product->insert($data, $table);
    }

    private function add_product_tag($data)
    {
        $table = 'product_tags';
        $result = $this->product->insert($data, $table);
    }

    private function add_product_gallery_images($product_id, $images)
    {
        foreach ($images as $img) {
            $data = [
                "product_id" => $product_id,
                "image" => $img
            ];
            $table = 'product_gallery_images';
            $result = $this->product->insert($data, $table);
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
