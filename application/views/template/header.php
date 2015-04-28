<header>
	<section class="row header-inner">
	
	<div id="logocontainer" class="small-10 medium-4 large-4 columns">
		<img id="logo" src="<?php echo base_url(); ?>img/logo.svg" alt="Barker Blagrave &amp; Associates Logo">
	</div>

		<div id="navcontainer" class="small-2 medium-8 large-8 columns">
			<?php if($this->session->userdata('is_logged_in')){
				echo '<div class="cmslinks">';
					echo '<ul>';
						echo '<li><a href="'. base_url() . index_page() . 'dashboard">ADMIN</a></li>';
						if(isset($pgdata->pages_id)){
							echo '<li><a href="'. base_url() . index_page() . 'pages/edit/' . $pgdata->pages_id . '">EDIT PAGE</a></li>';
						}
						echo '<li><a href="'. base_url() . index_page() . 'login/logout">LOGOUT</a></li>';
					echo '</ul>';
				echo '</div>';
			} ?>
			<p class="headertag"><img src="<?php echo base_url() ?>img/tagline.png" alt="tagline" /></p>
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
			<?php echo $mobmenu; ?>
		</ul>
	</aside>