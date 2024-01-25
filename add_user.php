<?php
	if(ISSET($_POST['save_user'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$section = $_POST['section'];
		$idmedico = $_POST['idmedico'];
		$ci_secretaria = $_POST['ci_secretaria'];
		$conn = new mysqli("localhost", "root", "", "hcpms");
		$q1 = $conn->query("SELECT * FROM `user` WHERE `username` = '$username'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Error: El nombre de usuario ya existe, por favor escriba otro.')</script>";
			}else{
				if($section=="Secre") {
					$conn->query("INSERT INTO `secretaria` VALUES('', '$username', '$password', '$firstname', '$lastname', '$section', '$idmedico', '$ci_secretaria')");				
				}
				else{}
				header("location: user_secretario.php");
			}
	}
?>
