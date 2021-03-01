<div class="main-content">
    <section class="section">
        <form action="" method="post" id="product_form">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" required>
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
                                                            <option value="">Please Select</option>
                                                            <?php foreach ($attributes as $key => $value) { ?>
                                                                <option value="<?= $value->attribute_id ?>"><?= $value->attribute_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <a href="javascript:void(0)" onclick="add_attribute(event);" class="btn btn-primary ml-2">Add</a>
                                                    </div>
                                                    <div id="accordion" class="accordian-attribute-div">

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-variation" role="tabpanel" aria-labelledby="list-variation-list">

                                                    <div class="d-flex w-50 mb-3">
                                                        <select name="variation_add" id="variation_add" class="form-control">
                                                            <option value="1">Create Variation From all attribute</option>
                                                        </select>
                                                        <a href="javascript:void(0)" onclick="create_variation()" class="btn btn-primary ml-2">GO</a>
                                                    </div>
                                                    <div id="accordion" class="accordian-variation-div">
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
                                <?php echo $category_view; ?>
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
                                <?php foreach ($tags as $key => $value) { ?>
                                    <option value="<?= $value->tag_id ?>"><?= $value->tag_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Product Image</h4>
                        </div>
                        <div class="card-body">
                            <input type="file" name="product_image" id="product_image" class="form-control">
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Product Gallery</h4>
                        </div>
                        <div class="card-body">
                            <input type="file" name="product_gallery" id="product_gallery" class="form-control" multiple>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Seller</h4>
                        </div>
                        <div class="card-body">
                            <select name="seller_id" id="seller_id" class="form-control">
                                <?php foreach ($seller as $key => $value) { ?>
                                    <option value="<?= $value->seller_id ?>"><?= $value->seller_name ?></option>
                                <?php } ?>
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

    function add_attribute(event) {
        var attribute_id = $("#attribute_list").val();
        var requesturl = "<?= base_url('admin/product/generate_attribute_list') ?>";
        $.ajax({
            url: requesturl,
            data: {
                attribute_id: attribute_id
            },
            type: "post",
            success: function(data) {
                $("#attribute_list").find("[value='" + attribute_id + "']").prop("disabled", true);
                $(".accordian-attribute-div").prepend(data);
            }
        });
    }

    $(document).on('click', '.delete_attribute', function() {
        var attribute_id = $(this).attr('data-id');
        var res = confirm("Are you sure you want to delete. All the variations associated with it will be deleted ?");
        if (res) {
            $(this).closest('.customAccordian').remove();
            $("#attribute_list").find("[value='" + attribute_id + "']").prop("disabled", false);
        }
    });

    function create_variation() {
        create_variation_from_attributes();
    }

    function create_variation_from_attributes() {
        $(".accordian-variation-div").empty();
        var variation_object = [];
        $(".accordian-attribute-div .customAccordian").each(function(index, value) {
            var that = $(this);
            var select_label = $(this).find('h4').text();
            var select_options = [];
            var select_value = [];
            $(this).find("input[name='attribute_value_ids[]']:checked").each(function() {
                select_options.push($(this).val());
                select_value.push($(this).attr('data-attribute-name'));
            });
            variation_object.push({
                label: select_label,
                option: select_options,
                option_value: select_value
            });
        });
        console.log(variation_object);
        let variations = variation_object[0];
        if (variation_object.length > 1) {
            for (let i in variation_object)
                if (i > 0) {
                    variations = add_variations_to_array(variations, variation_object[i]);
                }
        }
        var generate_html = '';
        console.log(variations);
        $.each(variations.option, function(index, valuei) {
            generate_html += `<div class='accordion customAccordian'>
                          <div class='accordion-header clearfix' role='button' data-toggle='collapse' data-target='#panel-body-${index}' aria-expanded='true'>`;
            var option_id = variations.option[index];
            var option_name = variations.option_value[index];
            option_id = variations.option[index].split("&-");
            option_name = variations.option_value[index].split("&-");
            console.log(option_id);
            console.log(option_name);
            $.each(option_id, function(index1, valuei1) {
                generate_html += `<label>${variation_object[index1].label}</label>`;
                generate_html += `<select name="attribute_${variation_object[index1].option[index1]}[${index}]" readonly>`;
                $.each(variation_object[index1].option, function(index2, valuei2) {
                    if (valuei2 == valuei1) {
                        generate_html += `<option value='${valuei2}' selected>${variation_object[index1].option_value[index2]}</option>`;
                    } else {
                        generate_html += `<option value='${valuei2}'>${variation_object[index1].option_value[index2]}</option>`;
                    }
                });
                generate_html += `</select>`;
            });
            generate_html += `<div class="caret-remove">
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
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    </div>`;
        });
        console.log("html" + generate_html);
        $(".accordian-variation-div").html(generate_html);
    }


    function add_variations_to_array(base, variations) {
        let ret = [];
        var option = [];
        var option_value = [];


        for (let e of base.option) {
            for (let variation of variations.option) {

                option.push(e + "&-" + variation);
            }
        }
        for (let e of base.option_value) {
            for (let variation of variations.option_value) {

                option_value.push(e + "&-" + variation);
            }
        }
        ret = {
            option: option,
            option_value: option_value
        };
        return ret;
    }
</script>