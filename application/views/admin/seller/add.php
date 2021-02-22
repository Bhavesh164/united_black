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
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data" autocomplete="off">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">First Name</label>
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Username</label>
                                    <input type="email" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="new-password" onfocus="this.removeAttribute('readonly');">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Country</label>
                                    <select class="form-control" name="country_id" id="country_id" required>
                                        <option value="">Please select</option>
                                        <?php foreach ($country as $key => $value) { ?>
                                            <option value="<?= $value->country_id ?>"><?= $value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">State</label>
                                    <select class="form-control" name="state_id" id="state_id" required>
                                        <option value="">Please select</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">IS Active</label>
                                    <div class="pretty p-switch p-fill" style="display: block;width: 100%;">
                                        <input type="checkbox" name="is_active">
                                        <div class="state p-success">
                                            <label>Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Seller Image</label>
                                    <input type="file" class="form-control" name="zipcode" id="zipcode" placeholder="Image">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="phone" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Please Select</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Business Registration No</label>
                                    <input type="text" class="form-control" name="business_reg_no" id="business_reg_no" placeholder="Business Registration No">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Vat File</label>
                                    <input type="text" class="form-control" name="vat_file" id="vat_file" placeholder="Vat File">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Vat File</label>
                                    <input type="text" class="form-control" name="vat_file" id="vat_file" placeholder="Vat File">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">VAT Registered</label>
                                    <select name="vat_registered" id="vat_registered" class="form-control" required>
                                        <option value="">Please Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Seller VAT</label>
                                    <input type="text" class="form-control" name="seller_vat" id="seller_vat" placeholder="Seller VAT">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Code</label>
                                    <input type="text" class="form-control" name="bank_code" id="bank_code" placeholder="Bank Code">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Account Name</label>
                                    <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Account Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">IBAN</label>
                                    <input type="text" class="form-control" name="iban" id="iban" placeholder="IBAN">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Bank Info</label>
                                    <input type="text" class="form-control" name="bank_info" id="bank_info" placeholder="Bank Info">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Account No</label>
                                    <input type="text" class="form-control" name="account_no" id="account_no" placeholder="Account No">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">BVN Number</label>
                                    <input type="text" class="form-control" name="bvn_number" id="bvn_number" placeholder="BVN Number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>