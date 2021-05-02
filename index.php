<?php
	require_once('lib/header.php');
?>

	<div class="wrapper">
		<div class="form signup">
			<header>Real time chat app</header>
			<form method="post" enctype="multipart/form-data">
				<div class="error-txt"></div>
				<div class="name-details">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="fname" placeholder="First Name">
					</div>
					<div class="field input">
						<label>Last Name</label>
						<input type="text" name="lname" placeholder="Last Name">
					</div>
				</div>
				<div class="field input">
					<label>Email Address</label>
					<input type="email" name="email" placeholder="Enter your email">
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter your passowrd">
					<p><i class="fas fa-eye"></i></p>
				</div>
				<div class="field image">
					<label>Select Image</label>
					<input type="file" name="image">
				</div>
				<div class="field button">
					<input type="submit" value="Continue to chat">
				</div>
			</form>
			<div class="link">Already signed up? <a href="login.php">Login now</a> </div>
		</div>
	</div>


<?php
	require_once('lib/footer.php');
?>
<script type="text/javascript" src="assets/js/signup.js"></script>