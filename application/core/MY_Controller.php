<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function template($view, $data = '')
    {
        if ($data == '') {
            $data = [];
        }
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function check_email_exist($email)
    {
        $res = $this->db->query("select user_id from users where email='{$email}'")->result();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function check_username_exist($username)
    {
        $res = $this->db->query("select username from users where username='{$username}'")->result();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function roles()
    {
        $res = [];
        $res = $this->db->query("select role_id,role_name from roles")->result();
        return $res;
    }

    public function check_email()
    {
        if (isset($_REQUEST['email_orig'])) {
            if (trim($_REQUEST['email_orig']) == trim($_REQUEST['email'])) {
                echo "true";
                die;
            }
        }
        $table = 'users';
        $fields = 'id';
        $where = array('email' => $_REQUEST['email']);
        $res = $this->user->get_specified_row($where, $fields, $table);
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function check_username()
    {
        if (isset($_REQUEST['username_orig'])) {
            if (trim($_REQUEST['username_orig']) == trim($_REQUEST['username'])) {
                echo "true";
                die;
            }
        }
        $table = 'users';
        $fields = 'user_id';
        $where = array('username' => $_REQUEST['username']);
        $res = $this->user->get_specified_row($where, $fields, $table);
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function get_user_fullname($user_id)
    {
        $fullname = $this->db->select('concat(u.first_name," ",u.last_name) as fullname')
            ->get_where('users u', array('user_id' => $user_id))
            ->row()
            ->fullname;
        return $fullname;
    }

    public function check_unique_category_slug($slug, $category_id = '')
    {
        $query = "select count(category_id) as count from category where slug='$slug'";
        if ($category_id != '') {
            $query .= " and category_id!=$category_id";
        }
        $res = $this->db->query($query)->row()->count;
        if ($res) {
            return false;
        } else {
            return true;
        }
    }

    public function check_unique_product_slug($slug, $product_id = '')
    {
        $query = "select count(product_id) as count from products where slug='$slug'";
        if ($product_id != '') {
            $query .= " and product_id!=$product_id";
        }
        $res = $this->db->query($query)->row()->count;
        if ($res) {
            return false;
        } else {
            return true;
        }
    }

    public function delete_image($path, $file)
    {
        $img_path = FCPATH . "/" . $path . $file;
        $thumb = FCPATH . $path . "thumb/" . $file;
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        if (file_exists($thumb)) {
            unlink($thumb);
        }
    }

    public function get_day_in_number()
    {
        $date = date('Y-m-d H:i:s');
        $weekday = date('l', strtotime($date));
        if ($weekday == 'Sunday') {
            return 0;
        } else if ($weekday = 'Monday') {
            return 1;
        } else if ($weekday = 'Tuesday') {
            return 2;
        } else if ($weekday = 'Wednesday') {
            return 3;
        } else if ($weekday = 'Thursday') {
            return 4;
        } else if ($weekday = 'Friday') {
            return 5;
        } else if ($weekday = 'Saturday') {
            return 6;
        }
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    public function upload_image($image, $path, $thumb_w = 175, $thumb_h = 175)
    {
        if (!empty($_FILES[$image]['name'])) {
            if (!file_exists($path . "thumb")) {
                mkdir($path . "thumb", 0777, true);
            }
            $file_name = time() . $_FILES[$image]['name'];
            $config = array();
            $config['upload_path'] = FCPATH . '/' . $path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($image)) {
                $error = array('error' => $this->upload->display_errors());
                $response = array("status" => 0, "error" => $error);
            } else {
                $uploaded_file = $this->upload->data()['file_name'];
                //*create thumbnail //
                $thumb = array();
                $thumb['image_library'] = 'gd2';
                $thumb['source_image'] = FCPATH . '/' . $path . $file_name;
                $thumb['new_image'] = FCPATH . '/' . $path . 'thumb/'; // path where you want to save thumnail
                $thumb['create_thumb'] = TRUE;
                $thumb['thumb_marker'] = '';
                $thumb['maintain_ratio'] = TRUE;
                $thumb['width']         = $thumb_w;
                $thumb['height']       = $thumb_h;
                $this->load->library('image_lib', $thumb);
                $this->image_lib->initialize($thumb);
                $this->image_lib->resize();
                $this->image_lib->clear();
                //create thumbanil
                $response = array("status" => 1, "filename" => $uploaded_file);
            }
        }
        return $response;
    }

    public function upload_images($files, $path, $thumb_w = 175, $thumb_h = 175)
    {
        if (!file_exists($path . "thumb")) {
            mkdir($path . "thumb", 0777, true);
        }
        $config = array(
            'upload_path'   => FCPATH . '/' . $path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'overwrite'     => 1,
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = time()  . $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);
            $status = 0;
            if ($this->upload->do_upload('images[]')) {
                $status = 1;
                $this->upload->data();
                //*create thumbnail //
                $thumb = array();
                $thumb['image_library'] = 'gd2';
                $thumb['source_image'] = FCPATH . '/' . $path . $fileName;
                $thumb['new_image'] = FCPATH . '/' . $path . 'thumb/'; // path where you want to save thumnail
                $thumb['create_thumb'] = TRUE;
                $thumb['thumb_marker'] = '';
                $thumb['maintain_ratio'] = TRUE;
                $thumb['width']         = $thumb_w;
                $thumb['height']       = $thumb_h;
                $this->load->library('image_lib', $thumb);
                $this->image_lib->initialize($thumb);
                $this->image_lib->resize();
                $this->image_lib->clear();
                //create thumbanil
            } else {
                return false;
            }
        }
        $response = array("status" => $status, "filename" => $images);
        return $response;
    }

    protected function getCategoryTree($level = 0, $prefix = '')
    {
        global $category_tree;
        $rows = $this->db
            ->select('category_id,parent_id,name')
            ->where('parent_id', $level)
            ->order_by('category_id', 'asc')
            ->get('category')
            ->result();


        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $category_tree[$row->category_id] = $prefix . $row->name;
                $this->getCategoryTree($row->category_id, $prefix . '--');
            }
        }
        return $category_tree;
    }

    public function country()
    {
        $res = $this->db->query("select * from country")->result();
        return $res;
    }

    public function state_with_ajax()
    {
        $html = '<option>Please Select</option>';
        $country_id = $_REQUEST['country_id'];
        $res = $this->db->query("select * from state where country_id='$country_id'")->result();
        foreach ($res as $key => $value) {
            $html .= "<option value='$value->state_id'>$value->name</option>";
        }
        echo $html;
    }

    public function check_seller_email()
    {
        $email = $_REQUEST['email'];
        $query = "select seller_id from seller where email='{$email}'";
        if (isset($_REQUEST['seller_id'])) {
            $seller_id = $_REQUEST['seller_id'];
            $query .= " and seller_id!=" . $seller_id;
        }
        $res = $this->db->query($query)->result();
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function check_seller_username()
    {
        $username = $_REQUEST['username'];
        $query = "select seller_id from seller where username='{$username}'";
        if (isset($_REQUEST['seller_id'])) {
            $seller_id = $_REQUEST['seller_id'];
            $query .= " and seller_id!=" . $seller_id;
        }
        $res = $this->db->query($query)->result();
        if (empty($res)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function current_date()
    {
        return date("Y-m-d H:i:s");
    }

    public function buildCategory($parent, $category, $counter = 0)
    {
        $html = "";
        if (isset($category['parent_cats'][$parent])) {
            if ($counter == 0) {
                $html .= "<ul id='product_catchecklist' class='form-no-clear list-unstyled'>\n";
            } else {
                $html .= "<ul>\n";
            }
            foreach ($category['parent_cats'][$parent] as $cat_id) {
                if (!isset($category['parent_cats'][$cat_id])) {
                    $html .= "<li>\n  <label><input type='checkbox' name='category[]'  value='" . $category['categories'][$cat_id]['category_id'] . "' required>" . $category['categories'][$cat_id]['name'] . "</label>\n</li> \n";
                }
                if (isset($category['parent_cats'][$cat_id])) {
                    $html .= "<li>\n  <label><input type='checkbox' name='category[]' value='" . $category['categories'][$cat_id]['category_id'] . "' required>" . $category['categories'][$cat_id]['name'] . "</label>\n \n";
                    $html .= $this->buildCategory($cat_id, $category, $counter);
                    $html .= "</li> \n";
                }
                $counter++;
            }
            $html .= "</ul> \n";
        }
        return $html;
    }

    public function tags()
    {
        $res = $this->db->query('select * from tag')->result();
        return $res;
    }

    public function get_seller()
    {
        $res = $this->db->query("select seller_id,concat(fname,' ',lname) as seller_name from seller where is_active='1'")->result();
        return $res;
    }

    public function get_attributes()
    {
        $res = $this->db->query("select * from attribute")->result();
        return $res;
    }

    public function get_attribute_values_from_attribute_id($attribute_id)
    {
        $res = $this->db->query("select * from attribute_value where attribute_id='$attribute_id'")->result();
        return $res;
    }
}
