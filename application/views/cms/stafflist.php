	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->staffbios_id; ?>"><h3><?php echo $row->staffbios_name; ?></h3></a>
		    <div id="panel<?php echo $row ->staffbios_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/staff/edit/' . $row->staffbios_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->staffbios_id; ?>" data-title="<?php echo $row->staffbios_name; ?>" data-controller="staff">Delete</a>
		    </div>
		      <p>"<?php echo $row->staffbios_bio; ?>"</p>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>