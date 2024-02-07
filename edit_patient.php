<?php
	$id = $_GET['id'];
	$lastname = $_GET['lastname'];

	if(ISSET($_POST['edit_query'])){
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['dni'];
		$lastname = $_POST['lastname'];
		$dni = $_POST['dni'];
		$age = $_POST['age'];
		$phil_health_no = $_POST['phil_health_no'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$genero = $_POST['genero'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp'];
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt'];
		$ht = $_POST['ht'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$conn->query("UPDATE `paciente` SET `cedula` = '$cedula', `phil_health_no` = '$phil_health_no', `firstname` = '$firstname', `dni` = '$dni', `lastname` = '$lastname', `birthdate` = '$birthdate', `age` = '$age', `address` = '$address', `civil_status` = '$civil_status', `sex` = '$genero', `BP` = '$bp', `TEMP` = '$temp', `PR` = '$pr', `RR` = '$rr', `WT` = '$wt', `HT` = '$ht' WHERE `paciente_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error()); 
			header("location:view_dental.php?id=".$id."&lastname=".$lastname."");
			$conn->close();	
	}
