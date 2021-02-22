<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/datatable.min.css' />
<div class="main-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/common/attributes') ?>"> Attributes</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <?= $attribute_name; ?></li>
        </ol>
    </nav>
    <?php if (!empty($this->session->flashdata('success'))) { ?>
        <div class='alert alert-success'><?php echo $this->session->flashdata('success'); ?></div>
    <?php } ?>
    <?php if (!empty($this->session->flashdata('error'))) { ?>
        <div class='alert alert-danger'><?php echo $this->session->flashdata('error'); ?></div>
    <?php } ?>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Attribute Value</h4>
                            <a href="<?php echo base_url() ?>admin/common/attributes_value_add/<?= $this->uri->segment(4) ?>">Add Attribute Value</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr_no = 1;
                                    foreach ($attribute_values as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo ucwords($value['attribute_value']); ?></td>
                                            <td><a href="<?php echo base_url() . 'admin/common/edit_attribute_value/' . $value['attribute_value_id'] ?>"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                    <?php $sr_no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/bundles/datatables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>