<header>
	<section class="row header-inner">
	
	<div id="logocontainer" class="small-10 medium-4 large-4 columns">
		<img id="logo" src="<?php echo base_url(); ?>img/logo.png" alt="Barker Blagrave &amp; Associates Logo">
	</div>

		<div id="navcontainer" class="medium-8 large-8 columns">
			<div class="navinner">
				<nav id="desktop-nav" class="top-bar hide-for-small" data-topbar role="navigation">
					<section class="top-bar-section">
						<ul class="left">
							<?php echo $navmenu; ?>
						</ul>
					</section>
				</nav>
				<div class="navinner hide-for-medium-up">
					<div id="navbutton">
						<a id="ocbutton" href="#mobile-nav" role="button" aria-controls="mobile-nav" aria-expanded="false" class="right-off-canvas-toggle">Menu</a>
					</div>
				</div>
			</div>
		</div>

	</section>

</header>

<div class="content-wrap row collapse">
		<main class="off-canvas-wrap" data-offcanvas>
			<div id="content" class="inner-wrap">

	<aside id="mobile-nav" class="right-off-canvas-menu hide-for-large">
		<ul class="off-canvas-list">
			<?php echo $mobmenu; ?>
		</ul>
	</aside>