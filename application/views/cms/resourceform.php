	<?php echo $formstart; ?>
	<div class="row">
		<label>Resource Title:</label>
		<span class="formerror"><?php echo form_error('title'); ?></span>
		<?php echo $title; ?>

		<label>Description:</label>
		<span class="formerror"><?php echo form_error('desc'); ?></span>
		<?php echo $desc; ?>
		
		<label>Options:</label>
		<div class="priceselect">
			<span><?php echo 'Email: ' . $emailcheck; ?></span>
			<span><?php echo 'CD: ' . $cdcheck; ?></span>
			<span><?php echo 'Manual: ' . $manualcheck; ?></span>
			<span><?php echo 'Associate Presentations/Sub-materials: ' . $indcheck; ?></span>
		</div>
		<div class="prices">
		<?php if(isset($id)): ?>
			<?php foreach($prices as $row): ?>
				<?php echo $row[0]; ?>
				<?php echo $row[1]; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		<h2>Presentations/Sub-materials:</h2>

		<div class="empty showme">
			None.
		</div>

		<div class="addpresentations">
			<p>Individual Price: $<?php echo $ind; ?> You must enter an individual price if you are entering any presentations/sub materials.</p>
			<p>Offer $<?php echo $discper; ?> discount per <?php echo $peramt; ?> purchased?</p>
			<?php 
				if(!empty($preslist)){
					foreach($preslist as $pres): ?>
						<div class="inputset">
							<i class="removeit fa fa-times"></i>
							<?php echo $pres ?>
						</div>
					<?php endforeach;
				}
			 ?>
			<div class="presentationslist">
			<label id="initial">
				<div class="inputset duplicateme">
					<i class="removeit fa fa-times"></i>
					<input type="text" name="presentationitems[]">
					<i class="addmore fa fa-plus"></i>
				</div>
			</label>
			</div>
		</div>
		
		<input type="submit" class="formsubmit" name="submit" value="Submit">
	</div>

	<?php if(isset($id)){ echo $id; } ?>
</form>