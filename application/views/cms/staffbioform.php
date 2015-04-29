<?php echo $formstart; ?>
	<div class="row">
		<label>Name:</label>
		<span class="formerror"><?php echo form_error('name'); ?></span>
		<?php echo $name; ?>

		<label>Degree:</label>
		<?php echo $degree; ?>
		
		<label>Designation:</label>
		<?php echo $designation; ?>

		<label>Phone Number:</label>
		<span class="formerror"><?php echo form_error('phone'); ?></span>
		<?php echo $phone; ?>
		
		<label>Fax Number:</label>
		<?php echo $fax; ?>

		<label>Mobile Phone Number:</label>
		<?php echo $mobile; ?>

		<label>Email Address:</label>
		<span class="formerror"><?php echo form_error('email'); ?></span>
		<?php echo $email; ?>

		<label>Street Number:</label>
		<span class="formerror"><?php echo form_error('streetnumber'); ?></span>
		<?php echo $streetnumber; ?>

		<label>Street Name:</label>
		<span class="formerror"><?php echo form_error('streetname'); ?></span>
		<?php echo $streetname; ?>

		<label>Rural Route:</label>
		<?php echo $rr; ?>

		<label>City:</label>
		<span class="formerror"><?php echo form_error('city'); ?></span>
		<?php echo $city; ?>

		<label>Province:</label>
		<span class="formerror"><?php echo form_error('province'); ?></span>
		<?php echo $province; ?>

		<label>Postal Code:</label>
		<span class="formerror"><?php echo form_error('postalcode'); ?></span>
		<?php echo $postalcode; ?>

		<label>Tagline:</label>
		<span class="formerror"><?php echo form_error('tagline'); ?></span>
		<?php echo $tagline; ?>

		<label>Biography:</label>
		<span class="formerror"><?php echo form_error('bio'); ?></span>
		<?php echo $bio; ?>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>