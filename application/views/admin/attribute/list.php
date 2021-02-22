<style>
    .tr_click {
        cursor: pointer;
    }
</style>
<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/datatable.min.css' />
<div class="main-content">
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
                            <h4>Attributes</h4>
                            <a href="<?php echo base_url() ?>admin/common/create_attribute">Add Attribute</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr_no = 1;
                                    foreach ($attributes as $key => $value) { ?>
                                        <tr class="tr_click" data-id="<?= $value['attribute_id'] ?>">
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo ucwords($value['attribute_name']); ?></td>
                                            <td><?php echo $value['display_name'] ?></td>
                                            <td><a href="<?php echo base_url() . 'admin/common/edit_attribute/' . $value['attribute_id'] ?>"><i class="fa fa-edit"></i></a></td>
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

    $(document).on("click", ".tr_click td:not(:last-child)", function() {
        var id = $(this).closest('tr').attr("data-id");
        window.location.href = "<?= base_url('admin/common/attribute_values/') ?>" + id;
    });
</script>