	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->jobs_id; ?>"><h3><?php echo $row->jobs_title; ?></h3></a>
		    <div id="panel<?php echo $row ->jobs_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/jobopenings/edit/' . $row->jobs_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->jobs_id; ?>" data-title="<?php echo $row->jobs_title; ?>" data-controller="jobopenings">Delete</a>
		    </div>
		    	<p><span class="bold">Type: </span><?php echo $row->jobs_type;?></p>
		    	<p><span class="bold">Location: </span><?php echo $row->jobs_location;?></p>
		    	<p><span class="bold">Start Date: </span><?php echo $row->jobs_start;?></p>
		    	<p><span class="bold">Description: </span><?php echo $row->jobs_desc;?></p>
		    	<p><span class="bold">Qualifications &amp; Requirements: </span><?php echo $row->jobs_reqs;?></p>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>