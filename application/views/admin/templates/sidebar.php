<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html"> <img alt="image" src="<?php echo base_url(); ?>assets/img/logo.png" class="header-logo" /> <span class="logo-name">Aegis</span>
			</a>
		</div>
		<div class="sidebar-user">
			<div class="sidebar-user-picture">
				<img alt="image" src="<?php echo base_url(); ?>assets/img/userbig.png">
			</div>
			<div class="sidebar-user-details">
				<div class="user-name">Sarah Smith</div>
				<div class="user-role">Administrator</div>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Catalog</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?= base_url('admin/common/categories') ?>">Categories</a></li>
					<li><a class="nav-link" href="<?= base_url('admin/common/attributes') ?>">Attributes</a></li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>Seller</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?= base_url('admin/seller/add') ?>">Seller</a></li>
				</ul>
			</li>
		</ul>
	</aside>
</div>