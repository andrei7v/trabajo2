<?php 
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "proyecto");
	$tildes = $conn->query("SET NAMES 'utf8'");
 ?>