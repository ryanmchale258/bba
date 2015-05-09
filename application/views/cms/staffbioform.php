<?php echo $formstart; ?>
	<div class="row">
		<div class="staff-photo small-6 columns">
			<?php if($imgerror){ echo '<span class="formerror">' . $imgerror . '</span>'; } ?>
			<div class="imguploadcontainer">
        	   <img src="<?php echo $imagesource; ?>" alt="Choose an Image" id="imageButton" type="file" name="image">
            	<?php echo $img; ?>
            </div>
		</div>
		
		<div class="small-6 columns">
			<label>Name:</label>
			<span class="formerror"><?php echo form_error('name'); ?></span>
			<?php echo $name; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Degree:</label>
			<?php echo $degree; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Designation:</label>
			<?php echo $designation; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Phone Number:</label>
			<span class="formerror"><?php echo form_error('phone'); ?></span>
			<?php echo $phone; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Fax Number:</label>
			<?php echo $fax; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Mobile Phone Number:</label>
			<?php echo $mobile; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Email Address:</label>
			<span class="formerror"><?php echo form_error('email'); ?></span>
			<?php echo $email; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Street Number:</label>
			<span class="formerror"><?php echo form_error('streetnumber'); ?></span>
			<?php echo $streetnumber; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Street Name:</label>
			<span class="formerror"><?php echo form_error('streetname'); ?></span>
			<?php echo $streetname; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Rural Route:</label>
			<?php echo $rr; ?>
		</div>
		
		<div class="small-6 columns">
			<label>City:</label>
			<span class="formerror"><?php echo form_error('city'); ?></span>
			<?php echo $city; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Province:</label>
			<span class="formerror"><?php echo form_error('province'); ?></span>
			<?php echo $province; ?>
		</div>
		
		<div class="small-6 columns">
			<label>Postal Code:</label>
			<span class="formerror"><?php echo form_error('postalcode'); ?></span>
			<?php echo $postalcode; ?>
		</div>
		
		<div class="small-12 columns">
			<label>Biography:</label>
			<span class="formerror"><?php echo form_error('bio'); ?></span>
			<?php echo $bio; ?>
		</div>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>