<?php
		if(ISSET($_POST['save_admin'])){
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname']; 
		$conn = new mysqli("localhost", "root", "", "hcpms");
		$q1 = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Username already taken')</script>";
			}else{
				$conn->query("INSERT INTO `admin` VALUES('', '$username', '$password', '$firstname', '$lastname')") or die(mysqli_error());
				include_once 'audit.php';
				audit($_SESSION['admin_id'], "Ha agregado un usuario administrador", "admin");
				header("location: admin.php");
			}				
		}
		
