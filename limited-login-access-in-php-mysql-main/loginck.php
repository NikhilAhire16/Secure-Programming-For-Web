<?php session_start(); error_reporting (E_ALL ^ E_NOTICE); 
	$uid = $_POST['uid'];
	$pass = $_POST['pass'];
	$con = mysqli_connect("localhost","root","","login");
	$s = mysqli_query($con,"select * from user where email='$uid' and password='$pass'");
	if($r = mysqli_fetch_array($s))
	{
		header("location:welcome.php");
	}
	else
	{
			$_SESSION['u']+=1;
			echo "You Enter ".$_SESSION['u']."Time Wrong  UID and Password";
			echo "<br><a href='index.php'>Try Again</a>";
			if($_SESSION['u']>2)
			{
				header('location:time.php');
			}
		
	}
?>