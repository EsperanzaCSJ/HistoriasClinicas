<?php
	if(ISSET($_POST['save_user'])){	
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$section = $_POST['section']; 
		$especialidad = $_POST['especialidad'];  
		$idmedico = $_POST['idmedico']; 
		$cimedico = $_POST['cimedico'];
		$conn = new mysqli("localhost", "root", "", "hcpms");
		$q1 = $conn->query("SELECT * FROM `user` WHERE `username` = '$username'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Username already taken')</script>";
			}else{
				if($section=="Medic") {
					$conn->query("INSERT INTO `user` VALUES('', '$username', '$password', '$firstname', '$lastname', '$section', '$especialidad', '$idmedico', '$cimedico')");
				} 
				else {
					$conn->query("INSERT INTO `secretaria` VALUES('', '$username', '$password', '$firstname', '$lastname', '$section', '$especialidad', '$idmedico', '$cimedico')");				
				}
				include_once 'audit.php';
				audit($_SESSION['admin_id'], "Ha agregado un usuario médico", "admin");

				header("location: user.php");
			}
	}
?>
