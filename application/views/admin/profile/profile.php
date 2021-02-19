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
						<h4>Profile</h4>
					</div>
					<form action="<?php echo base_url() ?>admin/profile/update" method="post" autocomplete="off" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">First Name</label>
									<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required value="<?php echo $users['fname']; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Last Name</label>
									<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required value="<?php echo $users['lname']; ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="<?php echo $users['email']; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Password <small> (Enter Only if you want to Change)</small></label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="new-password">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Username</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="<?php echo $users['username']; ?>">
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
<script>
	$(document).ready(function() {
		var get_role = '<?php echo $_SESSION['admin']['role_id'] ?>';
		if (get_role == 2) {
			$(".company_fields").show();
		} else {
			$(".company_fields").hide();
		}
	});
</script>