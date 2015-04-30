<header>
	<section class="row header-inner">
	
	<div id="logocontainer" class="small-10 medium-4 large-4 columns">
		<a href="<?php echo base_url() . index_page() ?>dashboard"><img id="logo" src="<?php echo base_url(); ?>img/logo.svg" alt="Barker Blagrave &amp; Associates Logo"></a>
	</div>

		<div id="navcontainer" class="small-2 medium-8 large-8 columns">
			<div class="cmslinks">
				<p><?php echo $this->session->userdata('name'); ?>'s Admin Panel</p>
				<ul>
					<li><a href="<?php echo base_url() . index_page() ?>home">View Site</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>login/logout">Log Out</a></li>
			</div>
			<div class="navinner">
				<nav id="desktop-nav" class="top-bar hide-for-small" data-topbar role="navigation">
					<section class="top-bar-section">
						<ul class="left">
							<li class="has-dropdown"><a href="<?php echo base_url() . index_page() ?>pages/edit">Pages</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>pages/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>pages/edit">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="<?php echo base_url() . index_page() ?>staff/edit">Staff</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>staff/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>staff/edit">Edit</a></li>
								</ul>
							</li>
							<?php if($this->session->userdata('level') == 1): ?>
							<li class="has-dropdown"><a href="<?php echo base_url() . index_page() ?>admin/edit">Admins</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>admin/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>admin/edit">Edit</a></li>
								</ul>
							</li>
							<?php endif; ?>
							<li class="has-dropdown"><a href="<?php echo base_url() . index_page() ?>testimonials/edit">Testimonials</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>testimonials/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>testimonials/edit">Edit</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="<?php echo base_url() . index_page() ?>jobopenings/edit">Job Postings</a>
								<ul class="dropdown">
									<li><a href="<?php echo base_url() . index_page() ?>jobopenings/add">Add</a></li>
									<li><a href="<?php echo base_url() . index_page() ?>jobopenings/edit">Edit</a></li>
								</ul>
							</li>
						</ul>
					</section>
				</nav>
				<div class="navinner hide-for-medium-up">
					<div id="navbutton">
						<a id="ocbutton" href="#mobile-nav" role="button" aria-controls="mobile-nav" aria-expanded="false" class="right-off-canvas-toggle menu-icon"><span></span></a>
					</div>
				</div>
			</div>
		</div>

	</section>

</header>

<div class="content-wrap row collapse">
		<main class="off-canvas-wrap" data-offcanvas>
			<div id="content" class="inner-wrap">

	<aside id="mobile-nav" class="right-off-canvas-menu hide-for-large-up">
		<ul class="off-canvas-list">
			<li class="has-submenu">
				<a href="<?php echo base_url() . index_page() ?>home">Pages</a>
				<ul class="right-submenu">
					<li><a href="<?php echo base_url() . index_page() ?>pages/add">Add</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>pages/edit">Edit</a></li>
					<li class="back"><a href="#">Back</a></li>
				</ul>
			</li>
			<li class="has-submenu">
				<a href="<?php echo base_url() . index_page() ?>home">Users</a>
				<ul class="right-submenu">
					<li><a href="<?php echo base_url() . index_page() ?>admin/add">Add</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>admin/edit">Edit</a></li>
					<li class="back"><a href="#">Back</a></li>
				</ul>
			</li>
			<li class="has-submenu">
				<a href="<?php echo base_url() . index_page() ?>home">Staff</a>
				<ul class="right-submenu">
					<li><a href="<?php echo base_url() . index_page() ?>staff/add">Add</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>staff/edit">Edit</a></li>
					<li class="back"><a href="#">Back</a></li>
				</ul>
			</li>
			<li class="has-submenu">
				<a href="<?php echo base_url() . index_page() ?>home">Testimonials</a>
				<ul class="right-submenu">
					<li><a href="<?php echo base_url() . index_page() ?>testimonials/add">Add</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>testimonials/edit">Edit</a></li>
					<li class="back"><a href="#">Back</a></li>
				</ul>
			</li>
			<li class="has-submenu">
				<a href="<?php echo base_url() . index_page() ?>home">Jobs</a>
				<ul class="right-submenu">
					<li><a href="<?php echo base_url() . index_page() ?>jobopenings/add">Add</a></li>
					<li><a href="<?php echo base_url() . index_page() ?>jobopenings/edit">Edit</a></li>
					<li class="back"><a href="#">Back</a></li>
				</ul>
			</li>
		</ul>
	</aside>