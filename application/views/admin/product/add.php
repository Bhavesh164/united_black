<div class="main-content">
    <section class="section">
        <form action="" method="post" id="product_form">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea name="short_description" id="short_description" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Long Description</label>
                        <textarea name="long_description" id="long_description" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom_list_group">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Product Data- </h4>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="0">Simple Product</option>
                                        <option value="1">Variable Product</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="list-group" id="list-tab" role="tablist">
                                                <a class="list-group-item list-group-item-action" id="list-general-list" data-toggle="list" href="#list-general" role="tab" aria-selected="false">General</a>
                                                <a class="list-group-item list-group-item-action" id="list-inventory-list" data-toggle="list" href="#list-inventory" role="tab" aria-selected="false">Inventory</a>
                                                <a class="list-group-item list-group-item-action active" id="list-shipping-list" data-toggle="list" href="#list-shipping" role="tab" aria-selected="true">Shipping</a>
                                                <a class="list-group-item list-group-item-action" id="list-attribute-list" data-toggle="list" href="#list-attribute" role="tab" aria-selected="false">Attribute</a>
                                                <a class="list-group-item list-group-item-action" id="list-variation-list" data-toggle="list" href="#list-variation" role="tab" aria-selected="false">Variation</a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade" id="list-general" role="tabpanel" aria-labelledby="list-general-list">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Regular Price ($)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="regular_price" id="regular_price" placeholder="Regular Price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Sale Price ($)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="Sale Price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-inventory" role="tabpanel" aria-labelledby="list-inventory-list">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">SKU</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="simple_sku" id="simple_sku" placeholder="SKU">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Stock Quantity</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="simple_stock_quantity" id="simple_stock_quantity" placeholder="Stock Quantity">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade active show" id="list-shipping" role="tabpanel" aria-labelledby="list-shipping-list">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Weight</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_weight" id="shipping_weight" placeholder="Weight">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Dimensions (cm)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control mb-2" name="shipping_length" id="shipping_length" placeholder="Length">
                                                            <input type="text" class="form-control mb-2" name="shipping_width" id="shipping_width" placeholder="WIdth">
                                                            <input type="text" class="form-control" name="shipping_height" id="shipping_height" placeholder="Height">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-attribute" role="tabpanel" aria-labelledby="list-attribute-list">
                                                    <div class="d-flex w-50 mb-3">
                                                        <select name="attribute_list" id="attribute_list" class="form-control">
                                                            <option value="0">First</option>
                                                            <option value="1">Second</option>
                                                        </select>
                                                        <button class="btn btn-primary ml-2">Add</button>
                                                    </div>
                                                    <div id="accordion">
                                                        <div class="accordion customAccordian">
                                                            <div class="accordion-header clearfix" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                                                <h4>Panel 1</h4>
                                                                <div class="caret-remove">
                                                                    <span class="down-caret"></span>
                                                                    <a href="javascript:void(0)" class="remove_row delete">Remove</a>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                        <div class="accordion">
                                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                                                <h4>Panel 2</h4>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                        <div class="accordion">
                                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                                                <h4>Panel 3</h4>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-variation" role="tabpanel" aria-labelledby="list-variation-list">

                                                    <div class="d-flex w-50 mb-3">
                                                        <select name="varit" id="attribute_list" class="form-control">
                                                            <option value="0">Add Variation</option>
                                                            <option value="1">Create Variation From all attribute</option>
                                                        </select>
                                                        <a href="javascript:void(0)" class="btn btn-primary ml-2">GO</a>
                                                    </div>
                                                    <div id="accordion">
                                                        <div class="accordion customAccordian">
                                                            <div class="accordion-header clearfix" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                                                <label for="">Size</label>
                                                                <select name="variation_size" id="variation_size">
                                                                    <option value="0">Small</option>
                                                                    <option value="1">Medium</option>
                                                                </select>
                                                                <label> Color </label>
                                                                <select name="variation_color" id="variation_color">
                                                                    <option value="0">White</option>
                                                                    <option value="1">Green</option>
                                                                </select>
                                                                <div class="caret-remove">
                                                                    <span class="down-caret"></span>
                                                                    <a href="javascript:void(0)" class="remove_row delete">Remove</a>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                        <div class="accordion">
                                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                                                <h4>Panel 2</h4>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                        <div class="accordion">
                                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                                                <h4>Panel 3</h4>
                                                            </div>
                                                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Product Status</h4>
                        </div>
                        <div class="card-body">
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                            <button class="btn btn-primary pull-right mt-3 w-50">Add</button>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Product Categories</h4>
                        </div>
                        <div class="card-body">

                            <div class="product_categories">
                                <ul id="product_catchecklist" class="form-no-clear list-unstyled">
                                    <li id="product_cat-15" class="">
                                        <label class="">
                                            <input value="15" type="checkbox" name="" id="" checked="checked">
                                            Uncategorized
                                        </label>
                                    </li>
                                    <li id="">
                                        <label class="">
                                            <input value="17" type="checkbox" name="" id="">
                                            Electronics
                                        </label>
                                        <ul class="">
                                            <li id="">
                                                <label class="">
                                                    <input value="18" type="checkbox" name="" id=""> Phones
                                                </label>
                                                <ul class="">
                                                    <li><label for=""><input type="checkbox" name="" id=""> Nokia</label></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <a href="<?= base_url('admin/common/create_category') ?>" class="href">+ Add New Category</a>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Product Tags</h4>
                        </div>
                        <div class="card-body">
                            <select name="product_tags" id="product_tags" class="form-control" multiple>
                                <option value="John">John</option>
                                <option value="Brian">Brian</option>
                                <option value="Carl">Carl</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/summernote/summernote-bs4.css">
<script src="<?php echo base_url(); ?>assets/bundles/summernote/summernote-bs4.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/select2/dist/css/select2.full.min.css">
<script src="<?php echo base_url(); ?>assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('#product_tags').select2({
            placeholder: "Please Select",
        });
    });
</script>