<div id="login" class="bodycontent">

	<div id="loginbox">
		<h2>Please enter your username and password to login.</h2>
		<?php echo $formstart; ?>
		<div class="loginset">
			<label>Username:</label>
			<?php echo $username; ?>
		</div>
		<div class="loginset">
			<label>Password:</label>
			<?php echo $password; ?>
		</div>
		<input type="submit" name="submit" value="Login">
	</div>