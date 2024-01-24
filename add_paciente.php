<?php
ob_start();
	if(ISSET($_POST['save_patient'])){
		$itr_no = $_POST['itr_no'];
		$nacionalidad = $_POST['nacionalidad'];
		$cedula = $_POST['cedula'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$itr_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('ITR No. must not be the same!')</script>";
		}else{
			$conn->query("INSERT INTO `itr` VALUES('$itr_no', '$nacionalidad', '$cedula', '$firstname', '$lastname', '$birthdate', '$age', '$address', '$civil_status', '$gender', '".addslashes($ht)."')") or die(mysqli_error());
			header("location: paciente.php");
		}
	}
ob_end_flush();
?>