<header>
	<section class="row small-collapse">
	<a id="ocbutton" href="#mobile-nav" role="button" aria-controls="mobile-nav" aria-expanded="false" class="right-off-canvas-toggle">Menu</a>	
	
		<img id="logo" class="small-10 small-centered medium-4 medium-uncentered large-3 columns" src="<?php echo base_url(); ?>img/logo.jpg" alt="Barker Blagrave &amp; Associates Logo">

		<div id="navcontainer" class="hide-for-small medium-8 large-9 columns">
			<div class="navinner">
				<nav id="desktop-nav" class="top-bar" data-topbar role="navigation">
					<section class="top-bar-section">
						<ul class="left">
							<?php echo $navmenu; ?>
						</ul>
					</section>
				</nav>
			</div>
		</div>

	</section>

</header>

<div class="content-wrap row">
		<main class="off-canvas-wrap" data-offcanvas>
			<div id="content" class="inner-wrap">

	<aside id="mobile-nav" class="right-off-canvas-menu">
		<ul class="off-canvas-list">
			<?php echo $navmenu; ?>
		</ul>
	</aside>