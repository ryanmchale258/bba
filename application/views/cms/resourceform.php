<div id="addpage" class="bodycontent">
	<h1><?php echo $header; ?></h1>
	
<?php echo $formstart; ?>
	<div class="row">
		<label>Resource Title:</label>
		<span class="formerror"><?php echo form_error('title'); ?></span>
		<?php echo $title; ?>

		<label>Description:</label>
		<span class="formerror"><?php echo form_error('desc'); ?></span>
		<?php echo $desc; ?>
		
		<label>CD Price:</label>
		<?php echo $cd; ?>

		<label>Email Price:</label>
		<?php echo $email; ?>

		<label>Manual Price:</label>
		<?php echo $manual; ?>
		
		<label>Combo Price:</label>
		<?php echo $combo; ?>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>