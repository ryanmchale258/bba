<div id="editlist" class="bodycontent">
	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->admin_id; ?>"><h3><?php echo $row->admin_firstname . ' ' . $row->admin_lastname; ?></h3></a>
		    <div id="panel<?php echo $row ->admin_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . 'index.php/admin/edit/' . $row->admin_id; ?>" class="edt">Edit</a>
				<a class="del" href="#" data-record="<?php echo $row->admin_id; ?>" data-title="<?php echo $row->admin_firstname; ?>" data-controller="admin">Delete</a>
		    </div>
		      <p>Username : <?php echo $row->pages_content; ?><br>
		      	Email : <?php echo $row->admin_email; ?><br>
		      	Last Logged In : <?php echo $row->admin_lastlogin; ?></p>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>