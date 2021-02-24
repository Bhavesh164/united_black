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
                        <h4>Add Tag</h4>
                    </div>
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tag</label>
                                    <input type="text" class="form-control" name="tag_name" id="tag_name" placeholder="Tag name" required>
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