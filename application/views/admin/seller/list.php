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
                            <h4>Sellers</h4>
                            <a href="<?php echo base_url() ?>admin/seller/add">Add Seller</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Address</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $sr_no = 1;
                                    foreach ($sellers as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['username']; ?></td>
                                            <td><?php echo $value['address']; ?></td>
                                            <td><?php if ($value['is_active'] == 1) {
                                                    echo "Yes";
                                                } else {
                                                    echo "No";
                                                } ?>
                                            </td>
                                            <td><a href="<?php echo base_url() . 'admin/seller/edit/' . $value['seller_id'] ?>"><i class="fa fa-edit"></i></a></td>
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