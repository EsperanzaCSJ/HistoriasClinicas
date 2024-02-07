<?php
ob_start();
	if(ISSET($_POST['save_patient'])){
		$paciente_no = $_POST['paciente_no'];
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
		$genero = $_POST['genero'];
		$idmedico = $_POST['idmedico'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$paciente_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('El número de la historia no debe ser el mismo!')</script>";
		}else{
			$conn->query("INSERT INTO `paciente` VALUES('$paciente_no', '$nacionalidad', '$cedula', '$firstname', '$lastname', '$birthdate', '$edad', '$address', '$civil_status', '$genero', '$idmedico')") or die(mysqli_error());
			header("location: paciente.php");
		}
	}
ob_end_flush();
?>