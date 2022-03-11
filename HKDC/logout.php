<?php 
require_once("includes/connection.php"); 
session_start();
date_default_timezone_set('America/La_Paz');
$operacion='cierre de sesion';
$fecha=date("Y/m/d");
$hora=date("H:i:s");
$dbusername=$_SESSION['username'];

$query =mysqli_query($con, "SELECT * FROM users");

$_GRABAR_SQL = "INSERT INTO logs (username,fecha,hora,operacion) VALUES ('$dbusername', '$fecha', '$hora', '$operacion')";
mysqli_query($con, $_GRABAR_SQL);
	

 	
session_start(1);
unset($_SESSION['username']);
session_destroy(1);
header("location:index.php");
?>
