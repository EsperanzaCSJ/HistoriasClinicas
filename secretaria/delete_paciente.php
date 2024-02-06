<?php
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `paciente` WHERE `paciente_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
	header("location:paciente.php");
?>