<?php
ob_start();
	if(ISSET($_POST['save_patient'])){
		$paciente_no = $_POST['paciente_no'];
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
		$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$paciente_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('paciente No. must not be the same!')</script>";
		}else{
			$conn->query("INSERT INTO `paciente` VALUES('$paciente_no', '$nacionalidad', '$cedula', '$firstname', '$lastname', '$birthdate', '$age', '$address', '$civil_status', '$genero', '".addslashes($ht)."')") or die(mysqli_error());
			header("location: patient.php");
		}
	}
ob_end_flush();
?>