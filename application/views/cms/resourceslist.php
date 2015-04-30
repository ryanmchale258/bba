	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row->resource_id; ?>"><h3><?php echo $row->resource_name; ?></h3></a>
		    <div id="panel<?php echo $row->resource_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/resources/edit/' . $row->resource_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->resource_id; ?>" data-title="<?php echo $row->resource_name; ?>" data-controller="resources">Delete</a>
		    </div>
		      <p>Description: <?php echo $row->resource_desc; ?></p>
		      <p>CD Price: <?php echo $row->resource_cdprice; ?></p>
		      <p>Email Price: <?php echo $row->resource_emailprice; ?></p>
		      <p>Manual Price: <?php echo $row->resource_manualprice; ?></p>
		      <p>Combo Price Price: <?php echo $row->resource_comboprice; ?></p>
		       <?php 
			    	foreach($presentations as $pres){
			    		if($pres->resource_id == $row->resource_id){
			    			echo '<p>' . $pres->presentation_name . '</p>';
			    		}
			    	}
			     ?>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>