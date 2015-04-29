<?php echo $formstart; ?>
	<div class="row">
		<label>Job Title:</label>
		<span class="formerror"><?php echo form_error('title'); ?></span>
		<?php echo $title; ?>

		<label>Job Type:</label>
		<span class="formerror"><?php echo form_error('type'); ?></span>
		<?php echo $type; ?>
		
		<label>Location:</label>
		<span class="formerror"><?php echo form_error('location'); ?></span>
		<?php echo $location; ?>

		<label>Start Date:</label>
		<span class="formerror"><?php echo form_error('startdate'); ?></span>
		<?php echo $startdate; ?>

		<label>Job Description:</label>
		<span class="formerror"><?php echo form_error('desc'); ?></span>
		<?php echo $desc; ?>
		
		<label>Qualifications &amp; Requirements:</label>
		<span class="formerror"><?php echo form_error('quals'); ?></span>
		<?php echo $quals; ?>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>