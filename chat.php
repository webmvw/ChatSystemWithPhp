<?php
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location:login.php");
	}
	require_once('lib/header.php');
?>


	<div class="wrapper">
		<div class="chat-area">
			<header>
				<a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
				<?php 
					$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id={$user_id}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
				<img src="assets/img/<?php echo $row['image']; ?>" alt="profile image">
				<div class="details">
					<span><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></span>
					<p><?php echo $row['status']; ?></p>
				</div>
			</header>
			<div class="chat-box">
				
			</div>
			<form method="POST" class="typing-area">
				<input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>">
				<input type="hidden" name="incoming_id" value="<?php echo $user_id; ?>">
				<input type="text" class="input-field" name="message" placeholder="Type your message here...">
				<button type="submit"><i class="fab fa-telegram-plane"></i></button>
			</form>
		</div>
	</div>

<?php
	require_once('lib/footer.php');
?>
<script type="text/javascript" src="assets/js/chat.js"></script>