	<?php echo $formstart; ?>
	<div class="row">
		<label>Resource Title:</label>
		<span class="formerror"><?php echo form_error('title'); ?></span>
		<?php echo $title; ?>

		<label>Description:</label>
		<span class="formerror"><?php echo form_error('desc'); ?></span>
		<?php echo $desc; ?>
		
		<label>Price Options:</label>
		<div class="priceselect">
			<span><?php echo 'Email: ' . $emailcheck; ?></span>
			<span><?php echo 'CD: ' . $cdcheck; ?></span>
			<span><?php echo 'Manual: ' . $manualcheck; ?></span>
			<span><?php echo 'Combo: ' . $combocheck; ?></span>
		</div>
		<div class="prices">
		<?php if(isset($id)): ?>
			<?php foreach($prices as $row): ?>
				<?php echo $row[0]; ?>
				<?php echo $row[1]; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>

		<h2 class="inline">Associate Presentations</h2><input type="checkbox" name="checkpres" onClick="togglePres();">

		<div class="addpresentations">
			<label id="initial">
				<input type="text" name="presentationitems[]" class="duplicateme"><i class="fa fa-times"></i>
			</label>
		</div>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>