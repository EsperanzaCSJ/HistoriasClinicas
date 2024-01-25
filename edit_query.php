<?php
	$id = $_GET['id'];
	$last = $_GET['lastname'];
	if(ISSET($_POST['edit_patient'])){
		$nacionalidad = $_POST['nacionalidad'];
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$fechaNacimiento = new DateTime($birthdate);
		$fechaActual = new DateTime();
		$fechaActual->format("d-m-Y");
		$diferencia = $fechaActual->diff($fechaNacimiento);
		$edad = $diferencia->y;
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("UPDATE `itr` SET `nacionalidad` = '$nacionalidad', `cedula` = '$cedula', `firstname` = '$firstname', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$edad', `address` = '$address', `civil_status` = '$civil_status', `gender` = '$gender' WHERE `itr_no` = '$id' && `lastname` = '$last'") or die(mysqli_error());
		header("location: paciente.php");
	}
	if(ISSET($_POST['edit_user'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$ci_secretaria = $_POST['ci_secretaria'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("UPDATE `secretaria` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `lastname` = '$lastname', `ci_secretaria` = '$ci_secretaria' WHERE `user_id` = '$id'") or die(mysqli_error());
		header("location: user_secretario.php");
	}
?>