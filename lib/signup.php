<?php
	session_start();

	require_once('config.php');

	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		// let's check email is valid or not
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
			// let's check email already exists in this database or not
			$sql = mysqli_query($conn, "SELECT email FROM users WHERE email='{$email}'");
			if(mysqli_num_rows($sql) > 0){
				echo "$email - this email is exists!!";
			}else{
				// let's check user upload file or not
				if(isset($_FILES['image'])){ // if file is uploaded
					$img_name = $_FILES['image']['name']; //getting user uploaded image name
					$tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder

					// let's explode image and get the last extention like jpg, png etc
					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode); //here we get the extension of an user uploaded image file
					$extension = ['jpg', 'jpeg', 'png']; //these are some valid img extension and we've store them in array
					if(in_array($img_ext, $extension) === true ){
						$time = time(); //this will return us current time
										//we need this time because when you uploading user image to in our folder we rename user file with current time
										// so all the image file will bave a unique name
						$new_img_name = $time.$img_name;
						if(move_uploaded_file($tmp_name, "../assets/img/".$new_img_name)){ // if user upload img move to our folder successfully
							$status = "Active Now"; // once user signed up then his status will be active now
							$random_id = rand(time(), 10000000); //creating random id for user

							// let's insert all user data inside table
							$sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, password, image, status) VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
							if($sql2){
								$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
								if(mysqli_num_rows($sql3) > 0){
									$row = mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id'] = $row['unique_id'];
									echo "success";
								}
							}else{
								echo "Something went wrong!!!";
							}
						}
					}else{
						echo "Please select an image file - jpg, jpeg, png!!";
					}
				}else{
					echo "Please select an image file!!";
				}
			}
		}else{
			echo "$email - this is not a valid email!!!";
		}
	}else{
		echo "All input file is required!";
	}
?>