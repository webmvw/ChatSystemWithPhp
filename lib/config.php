<?php
$conn = mysqli_connect('localhost', 'root', '', 'chat');
if(!$conn){
	echo "database connect".mysqli_connect_error();
}

?>