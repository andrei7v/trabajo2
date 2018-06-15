<?php 
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "producto");
	$tildes = $conn->query("SET NAMES 'utf8'");
 ?>