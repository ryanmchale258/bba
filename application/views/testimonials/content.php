<div id="testimonials" class="row bodycontent">
	<h1>Testimonials</h1>
	<?php foreach($arrTestimonials as $row): ?>
		<article id="<?php echo $row->testimonials_id; ?>" class="small-12 columns">
			<p>"<?php echo $row->testimonials_content; ?>"</p>
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