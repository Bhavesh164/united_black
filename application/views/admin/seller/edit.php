<link rel='stylesheet' href='<?php echo base_url(); ?>assets/bundles/pretty-checkbox/pretty-checkbox.min.css' />
<div class="main-content">
    <section class="section">
        <div class="row ">
            <div class="col-12 col-md-12 col-lg-12">
                <?php if (!empty($this->session->flashdata('success'))) { ?>
                    <div class='alert alert-success'><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class='alert alert-danger'><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add new Seller</h4>
                    </div>
                    <form action="" id="seller_form" method="post" autocomplete="off" enctype="multipart/form-data" autocomplete="off">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required value="<?= $seller_detail['fname'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required value="<?= $seller_detail['lname'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="<?= $seller_detail['email'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="<?= $seller_detail['username'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="new-password" onfocus="this.removeAttribute('readonly');">
                                    <small>Write only if you want to change </small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Country</label>
                                    <select class="form-control" name="country_id" id="country_id" required>
                                        <option value="">Please select</option>
                                        <?php foreach ($country as $key => $value) { ?>
                                            <option value="<?= $value->country_id ?>" <?php if ($seller_detail['country_id'] == $value->country_id) {
                                                                                            echo 'selected';
                                                                                        }  ?>><?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">State</label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="">Please select</option>
                                        <?php foreach ($states as $key => $value) { ?>
                                            <option value="<?= $value->state_id ?>" <?php if ($value->state_id == $seller_detail['state_id']) {
                                                                                        echo 'selected';
                                                                                    }  ?>><?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?= $seller_detail['city'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code" value="<?= $seller_detail['zipcode'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">IS Active</label>
                                    <div class="pretty p-switch p-fill" style="display: block;width: 100%;">
                                        <input type="checkbox" name="is_active" <?php if ($seller_detail['is_active'] == 1) {
                                                                                    echo 'checked';
                                                                                } ?>>
                                        <div class="state p-success">
                                            <label>Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Seller Image</label>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="phone" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No" value="<?= $seller_detail['phone_no'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"><?= $seller_detail['address'] ?></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Please Select</option>
                                        <option value="0" <?php if ($seller_detail['gender'] == 0) {
                                                                echo 'selected';
                                                            } ?>>Male</option>
                                        <option value="1" <?php if ($seller_detail['gender'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Business Registration No</label>
                                    <input type="text" class="form-control" name="business_reg_no" id="business_reg_no" placeholder="Business Registration No" value="<?= $seller_detail['business_reg_no'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Vat File</label>
                                    <input type="text" class="form-control" name="vat_file" id="vat_file" placeholder="Vat File" value="<?= $seller_detail['vat_file'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Vat File</label>
                                    <input type="text" class="form-control" name="vat_file" id="vat_file" placeholder="Vat File" value="<?= $seller_detail['vat_file'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">VAT Registered</label>
                                    <select name="vat_registered" id="vat_registered" class="form-control" required>
                                        <option value="">Please Select</option>
                                        <option value="0" <?php if ($seller_detail['vat_registered'] == 0) {
                                                                echo 'selected';
                                                            } ?>>No</option>
                                        <option value="1" <?php if ($seller_detail['vat_registered'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Yes</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Seller VAT</label>
                                    <input type="text" class="form-control" name="seller_vat" id="seller_vat" placeholder="Seller VAT" value="<?= $seller_detail['seller_vat'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<?= $seller_detail['company_name'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank Name" value="<?= $seller_detail['bank_name'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Code</label>
                                    <input type="text" class="form-control" name="bank_code" id="bank_code" placeholder="Bank Code" value="<?= $seller_detail['bank_code'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Account Name</label>
                                    <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Account Name" value="<?= $seller_detail['account_name'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">IBAN</label>
                                    <input type="text" class="form-control" name="iban" id="iban" placeholder="IBAN" value="<?= $seller_detail['iban'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Info</label>
                                    <input type="text" class="form-control" name="bank_info" id="bank_info" placeholder="Bank Info" value="<?= $seller_detail['bank_info'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Account No</label>
                                    <input type="text" class="form-control" name="account_no" id="account_no" placeholder="Account No" value="<?= $seller_detail['account_no'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">BVN Number</label>
                                    <input type="text" class="form-control" name="bvn_number" id="bvn_number" placeholder="BVN Number" value="<?= $seller_detail['bvn_number'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name" value="<?= $seller_detail['shop_name'] ?>">
                                </div>
                                <?php if (file_exists(FCPATH . 'uploads/seller/' . $seller_detail['cov_picture'])) { ?>
                                    <div class="form-group col-md-4">
                                        <img src="<?= base_url('uploads/seller/thumb/' . $seller_detail['cov_picture']) ?>" alt="">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="seller_id" value="<?= $this->uri->segment(4); ?>">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
    $(document).on("change", "#country_id", function() {
        var country_id = $(this).val();
        var requesturl = "<?= base_url('admin/seller/state_with_ajax') ?>";
        $.ajax({
            url: requesturl,
            data: {
                country_id: country_id
            },
            type: "post",
            success: function(data) {
                $("#state_id").html(data);
            }
        });
    });

    var validate = $("#seller_form").validate({
        rules: {
            "fname": {
                required: true,
                maxlength: 50,
            },
            "lanme": {
                required: true,
                maxlength: 50,
            },
            "username": {
                required: true,
                maxlength: 50,
                remote: {
                    url: "<?php echo base_url() ?>admin/seller/check_seller_username",
                    data: {
                        'seller_id': function() {
                            return $("input[name=seller_id]").val()
                        }
                    },
                },
            },
            "email": {
                email: true,
                required: true,
                remote: {
                    url: "<?php echo base_url() ?>admin/seller/check_seller_email",
                    data: {
                        'seller_id': function() {
                            return $("input[name=seller_id]").val()
                        }
                    },
                },
            },
        },
        messages: {
            email: {
                remote: jQuery.validator.format("{0} is already taken.")
            },
            username: {
                remote: jQuery.validator.format("{0} is already taken.")
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>