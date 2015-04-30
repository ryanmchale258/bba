<div id="dashboard-wrap" class="bodycontent">
	<h1>Settings</h1>
	<section id="settings-panel">
		<?php echo $formstart; ?>
		<label>Main Contact Email:</label>
		<span class="formerrors"><?php echo form_error('main-contact'); ?></span>
		<?php echo $contactemail; ?>
		<input type="submit" class="formsubmit" name="submit" value="Submit">
		<a href="<?php echo base_url().index_page(); ?>settings/restore_record/restore_defaults" class="restore">Default</a>
		<?php if(isset($successmessage)){
			echo '<p>'.$successmessage.'</p>';
		}
		?>
	</section>