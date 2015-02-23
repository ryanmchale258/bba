<div id="testimonials" class="row">
	<?php foreach($arrTestimonials as $row): ?>
		<article class="small-12 columns">
			<?php echo $row->testimonials_content; ?>
			<span>
				<?php echo $row->testimonials_author; ?>
			</span>
			<span>
				<?php if(empty($row->testimonials_position)){
					echo ', '.$row->testimonials_position;
				}
				?>
			</span>
			<span>
				<?php if(empty($row->testimonials_position)){
					echo ', '.$row->testimonials_company;
				}
				?>
			</span>
			<span>
				<?php if(empty($row->testimonials_position)){
					echo ', '.$row->testimonials_location;
				}
				?>
			</span>
		</article>
	<?php endforeach; ?>