<?php
	session_start();

	require_once('config.php');

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if(!empty($email) && !empty($password)){
		// let's check email is valid or not
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
			$sql = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'");
			if(mysqli_num_rows($sql) > 0){
				$row = mysqli_fetch_assoc($sql);
				$_SESSION['unique_id'] = $row['unique_id'];
				echo "success";
			}else{
				echo "Email or Password is incorrect!!";
			}
		}else{
			echo "$email - this is not a valid email!!!";
		}
	}else{
		echo "All input file is required!";
	}
?>