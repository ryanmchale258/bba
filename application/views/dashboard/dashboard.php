<div id="dashboard-wrap" class="bodycontent">
	<h1>Welcome to your admin panel, <?php echo $this->session->userdata('name'); ?>.</h1>
	<section id="dashboard-panel" class="text-center">
		<ul class="row" data-equalizer>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-file-text"></i><br><a href="<?php echo base_url() . index_page(); ?>pages/add">Add</a> / <a href="<?php echo base_url() . index_page(); ?>pages/edit">Edit</a><br><p class="dashboard-desc">Add, Edit or Delete pages on the main site</p></li>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-users"></i><br><a href="#">Add</a> / <a href="#">Edit</a><br><p class="dashboard-desc">Add, Edit or Delete users for the admin system</p></li>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-user-plus"></i><br><a href="<?php echo base_url() . index_page(); ?>admin/add">Add</a> / <a href="<?php echo base_url() . index_page(); ?>admin/edit">Edit</a><br><p class="dashboard-desc">Add, Edit or Delete staff profiles</p></li>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-comment"></i><br><a href="<?php echo base_url() . index_page(); ?>testimonials/add">Add</a> / <a href="<?php echo base_url() . index_page(); ?>testimonials/edit">Edit</a><br><p class="dashboard-desc">Add, Edit or Delete testimonials</p></li>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-newspaper-o"></i><br><a href="<?php echo base_url() . index_page(); ?>jobopenings/add">Add</a> / <a href="<?php echo base_url() . index_page(); ?>jobopenings/edit">Edit</a><br><p class="dashboard-desc">Add, Edit or Delete job postings</p></li>
			<li class="small-6 medium-4 columns admin-nav" data-equalizer-watch><i class="fa fa-cog"></i><br><a href="#">Settings</a><p class="dashboard-desc">Edit admin settings</p></li>
		</ul>
	</section>
