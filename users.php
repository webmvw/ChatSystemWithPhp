<?php
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location:login.php");
	}
	require_once('lib/header.php');
?>
	<div class="wrapper">
		<div class="users">
			<header>
				<?php 
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id={$_SESSION['unique_id']}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
				<div class="content">
					<img src="assets/img/<?php echo $row['image']; ?>" alt="profile image">
					<div class="details">
						<span><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></span>
						<p><?php echo $row['status']; ?></p>
					</div>
				</div>
				<a href="#" class="logout">Log Out</a>
			</header>
			<div class="search">
				<span class="text">Select an user to start chat</span>
				<input type="text" placeholder="Enter name to search...">
				<button><i class="fas fa-search"></i></button>
			</div>
			<div class="users-list">
				
			</div>
		</div>
	</div>


<?php
	require_once('lib/footer.php');
?>
