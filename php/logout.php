<?php 
	session_start();
	session_destroy();
	session_unset($_SESSION['usuario']);
	header("location:../index.php");
	session_unset();
?>