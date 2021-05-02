<?php
	require_once('lib/header.php');
?>
	<div class="wrapper">
		<div class="form login">
			<header>Real time chat app</header>
			<form method="post">
				<div class="error-txt"></div>
				<div class="field input">
					<label>Email Address</label>
					<input type="email" name="email" placeholder="Enter your email">
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter your passowrd">
					<p><i class="fas fa-eye"></i></p>
				</div>
				<div class="field button">
					<input type="submit" value="Continue to chat">
				</div>
			</form>
			<div class="link">Not yet signed up? <a href="index.php">Signup Now</a> </div>
		</div>
	</div>


<?php
	require_once('lib/footer.php');
?>

	<script type="text/javascript" src="assets/js/login.js"></script>
