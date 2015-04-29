<?php echo $formstart; ?>
	<div class="row">
		<label>Author:</label>
		<span class="formerror"><?php echo form_error('author'); ?></span>
		<?php echo $author; ?>

		<label>Position</label>
		<?php echo $position; ?>
		
		<label>Company:</label>
		<?php echo $company; ?>

		<label>Location:</label>
		<?php echo $location; ?>

		<label>Testimonial Excerpt:</label>
		<span class="formerror"><?php echo form_error('shrt'); ?></span>
		<?php echo $shrt; ?>
		
		<label>Testimonial:</label>
		<span class="formerror"><?php echo form_error('testimonial'); ?></span>
		<?php echo $testimonial; ?>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>