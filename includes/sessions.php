<?php
session_start();
$_SESSION["sessUserID"] = $sessUserID;
if( !isset( $_COOKIE['MyPortal']  ) ) 
{ 
     header('Location: login.php');

} 

?>