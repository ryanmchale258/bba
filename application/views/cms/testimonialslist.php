	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->testimonials_id; ?>"><h3><?php echo $row->testimonials_author; ?>'s Testimonial</h3></a>
		    <div id="panel<?php echo $row ->testimonials_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/testimonials/edit/' . $row->testimonials_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->testimonials_id; ?>" data-title="<?php echo $row->testimonials_author; ?>'s Testimonial" data-controller="testimonials">Delete</a>
		    </div>
		      <p>"<?php echo $row->testimonials_content; ?>"</p>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>