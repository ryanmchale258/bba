	<section class="row">
		<ul class="accordion" data-accordion>
		<?php foreach($items as $row): ?>
		  <li class="accordion-navigation">
		    <a href="#panel<?php echo $row ->admin_id; ?>"><h3><?php echo $row->admin_firstname . ' ' . $row->admin_lastname; ?></h3></a>
		    <div id="panel<?php echo $row ->admin_id; ?>" class="content">
		    <div class="controls">
		    	<a href="<?php echo base_url() . index_page() . 'admin/edit/' . $row->admin_id; ?>" class="edt">Edit</a>
		    	<a href="<?php echo base_url() . index_page() . 'admin/newpass/' . $row->admin_id; ?>">Reset Password</a>
				<a class="del" href="#" data-record="<?php echo $row->admin_id; ?>" data-title="<?php echo $row->admin_firstname; ?>" data-controller="admin">Delete</a>
		    </div>
		      <p>Username : <?php echo $row->admin_username; ?><br>
		      	Email : <?php echo $row->admin_email; ?><br>
		      	Admin Level : <?php 
		      					if($row->admin_level == 1){
		      						echo 'Super Admin';
		      					}else{
		      						echo 'Administrator';
		      					}
		      					 ?><br>
		      	Last Logged In : <?php 
		      						if($row->admin_lastlogin == '0'){
		      							echo 'Never';
		      						}else{
							      		echo date('m/d/Y', $row->admin_lastlogin);
							      	}
							      	?></p>
		    </div>
		  </li>
		<?php endforeach; ?>
		</ul>
	</section>