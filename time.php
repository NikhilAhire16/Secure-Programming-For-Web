<?php 

	session_start();
	session_destroy();

	setcookie('user','Try After 20 Seconds',time()+20);
	header("location:sign.php");
?>