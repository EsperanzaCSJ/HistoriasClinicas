<?php
	$id = $_GET['id'];
	$last = $_GET['lastname'];
	if(ISSET($_POST['edit_patient'])){
		$nacionalidad = $_POST['nacionalidad'];
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['month']."/".$_POST['day']."/".$_POST['year'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$genero = $_POST['genero'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("UPDATE `paciente` SET `nacionalidad` = '$nacionalidad', `cedula` = '$cedula', `firstname` = '$firstname', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$age', `address` = '$address', `civil_status` = '$civil_status', `genero` = '$genero' WHERE `paciente_no` = '$id' && `lastname` = '$last'") or die(mysqli_error());
		header("location: patient.php");
	}
	if(ISSET($_POST['edit_admin'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$conn->query("UPDATE `admin` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `lastname` = '$lastname' WHERE `admin_id` = '$id'") or die(mysqli_error());
			include_once 'audit.php';
				audit($_SESSION['admin_id'], "Ha editado un usuario administrador", "admin");
			header("location: admin.php");
		}
	if(ISSET($_POST['edit_user'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$especialidad = $_POST['especialidad'];
			$idmedico = $_POST['idmedico'];
			$cimedico = $_POST['cimedico'];
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$conn->query("UPDATE `user` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `lastname` = '$lastname', `especialidad` = '$especialidad', `idmedico` = '$idmedico', `cimedico` = '$cimedico' WHERE `user_id` = '$id'") or die(mysqli_error());
			include_once 'audit.php';
			audit($_SESSION['admin_id'], "Ha editado un usuario médico", "admin");
			header("location: user.php");
		}