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
                        <h4>Add new category</h4>
                    </div>
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Slug</label>
                                    <input type="text" class="form-control" name="category_slug" id="category_slug" placeholder="Category Slug">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Parent</label>
                                    <select name="parent_id" id="parent_id" class="form-control">
                                        <option value="" selected>None</option>
                                        <?php foreach ($category_tree as $key => $value) { ?>
                                            <option value="<?= $key ?>"><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Description</small></label>
                                    <textarea name="category_description" id="category_description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
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