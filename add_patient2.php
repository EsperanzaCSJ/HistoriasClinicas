<?php
	if(ISSET($_POST['save_patient'])){
		$paciente_no = $_POST['paciente_no'];
		$date1= $_POST['date1'];
		//$cedula = $_POST['cedula'];
		$cedula = "";
		$firstname = $_POST['firstname'];
		//$middlename = $_POST['middlename'];
		$dni = $_POST['dni'];
		$lastname = $_POST['lastname'];
		//$birthdate = $_POST['month']."/".$_POST['day']."/".$_POST['year'];
		$birthdate = $_POST['user_date'];
		$age = $_POST['age'];
		$phil_health_no = $_POST['phil_health_no'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$genero = $_POST['genero'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp']."&deg;C";
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt']."kg";
		$ht = $_POST['ht'];
		$telefono=$_POST['trabajo'];
		$trabajo=$_POST['telefono'];
		$enfermedad_actual=$_POST['enfermedad'];
		$patologicos=$_POST['patologicos'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$paciente_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('Nro Documento de Identidad . must not be the same!')</script>";
		}else{
			$conn->query("INSERT INTO paciente VALUES ('$paciente_no', '$date1','$cedula', '$phil_health_no', '$firstname', '$dni', '$lastname', '$birthdate', '$age', '$address', '$civil_status', '$genero', '$bp', '$temp', '$pr', '$rr', '$wt', '".addslashes($ht)."','$telefono', '$trabajo', '$enfermedad_actual','$patologicos')") or die(mysqli_error($conn));
			header("location: patient.php");	
		}
	}
	//$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error($myConnection)); 