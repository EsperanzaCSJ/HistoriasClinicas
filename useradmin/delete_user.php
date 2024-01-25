<?php
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `user` WHERE `user_id` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
	include_once 'audit.php';
	audit($_SESSION['admin_id'], "Ha eliminado un usuario médico", "admin");
	header("location:user.php");

