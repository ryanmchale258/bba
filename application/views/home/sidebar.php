<div class="sidebar-testimonials small-12 medium-4 columns">
	<blockquote>
		<p>... <?php echo $randTestimonial->testimonials_shrt; ?> ...</p>
		<cite>
			<?php
				echo $randTestimonial->testimonials_author;
				if(!empty($randTestimonial->testimonials_company)){
					echo ',<br> ' . $randTestimonial->testimonials_company;
				}
			 ?><br>
			 <a href="<?php echo base_url() . index_page() . 'testimonials#' . $randTestimonial->testimonials_id ?>">READ MORE<span>&gt;&gt;</span></a>
		</cite>
	</blockquote>
</div>