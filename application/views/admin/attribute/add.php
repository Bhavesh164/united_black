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
                        <h4>Add new attribute</h4>
                    </div>
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Attribute Name</label>
                                    <input type="text" class="form-control" name="attribute_name" id="attribute_name" placeholder="Attribute Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Display Name</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Display Name" required>
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