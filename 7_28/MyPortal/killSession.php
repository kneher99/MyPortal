<?php
	setcookie("MyPortal", "", time()-3600);
	session_destroy(); 
	header('Location: login.php');
?>