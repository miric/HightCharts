<?php
session_start();
if(!isset($_SESSION['usuario']) !="0") {
	header('Location: login.php');
}
?>