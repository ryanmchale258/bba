<div class="bodycontent">
	<h1>Contact Us</h1>

	<p>If you have any inquiries or concerns please use the form below to contact us via email. We will respond as soon as possible.</p>

	<?php echo $formstart; ?>

	<label>
		Name:
		<?php echo $name; ?>
	</label>

	<label>
		Email:
		<?php echo $email; ?>
	</label>

	<label>
		Subject:
		<?php echo $subject; ?>
	</label>

	<label>
		Message:
		<?php echo $message; ?>
	</label>

	<label class="captcha">
		<?php echo $captcha['image']; ?>
		Please enter the characters seen to the left in the box below:
		<?php echo $cap_verify; ?>
	</label>

	<input type="submit" name="submit" value="send">

	</form>