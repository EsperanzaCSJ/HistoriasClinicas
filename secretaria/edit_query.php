<?php
	$id = $_GET['id'];
	$last = $_GET['lastname'];
	if(ISSET($_POST['edit_patient'])){
		$nacionalidad = $_POST['nacionalidad'];
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$genero = $_POST['genero'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("UPDATE `paciente` SET `nacionalidad` = '$nacionalidad', `cedula` = '$cedula', `firstname` = '$firstname', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$age', `address` = '$address', `civil_status` = '$civil_status', `genero` = '$genero' WHERE `paciente_no` = '$id' && `lastname` = '$last'") or die(mysqli_error());
		header("location: paciente.php");
	}