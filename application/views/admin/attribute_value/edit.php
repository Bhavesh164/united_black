<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/common/attributes') ?>"> Attributes</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/common/attribute_values/' . $attribute_value['attribute_id']) ?>"> <?= $attribute_name ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"> <?= 'Edit' ?></li>
        </ol>
    </nav>
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
                        <h4>Update attribute value</h4>
                    </div>
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Attribute Value</label>
                                    <input type="text" class="form-control" name="attribute_value" id="attribute_value" placeholder="Attribute Value" required value="<?= $attribute_value['attribute_value'] ?>">
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