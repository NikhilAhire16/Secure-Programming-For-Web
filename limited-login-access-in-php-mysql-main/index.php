<?php session_start(); error_reporting (E_ALL ^ E_NOTICE); 
if(isset($_COOKIE['user']))
{
?>
	<meta http-equiv="refresh" content="20">
<?php
	echo "<div style='color:white; padding:20px; font-size:2.5em; background:tomato;'><b>Block User</b> <br>".$_COOKIE['user']."</div>";
}
else
{
?>
<form action="loginck.php" method="post">
	<input type="" name="uid" placeholder="Enter UserID"><br><br>
	<input type="password" name="pass" placeholder="Enter password"><br><br>
	<button name="btn">Click Me</button>
</form>
<?php
}
?>