<div class="bodycontent">
	<section class="row">
	<div class="clearfix options small-12 medium-6 medium-push-6 columns">
		<?php if($this->router->fetch_method() == 'edit'): ?>
			<a href="<?php echo base_url() . index_page() . $this->router->fetch_class() ?>/add"><i class="fa fa-plus-square"></i><span>Add</span></a>
			<a class="cms-active" href="<?php echo base_url() . index_page() . $this->router->fetch_class() ?>/edit"><i class="fa fa-pencil-square"></i><span>Edit</span></a>
		<?php else: ?>
			<a class="cms-active" href="<?php echo base_url() . index_page() . $this->router->fetch_class() ?>/add"><i class="fa fa-plus-square"></i><span>Add</span></a>
			<a href="<?php echo base_url() . index_page() . $this->router->fetch_class() ?>/edit"><i class="fa fa-pencil-square"></i><span>Edit</span></a>
		<?php endif; ?>
	</div>
	<div class="small-12 medium-6 medium-pull-6 columns">
		<h1><?php echo $header; ?></h1>
	</div>
	</section>