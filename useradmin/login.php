<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(ISSET($_POST['login'])){
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$query = $conn->query("SELECT *FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
			if($valid > 0){
				$_SESSION['admin_id'] = $fetch['admin_id'];
				include_once 'audit.php';
				audit($_SESSION['admin_id'], "Ha ingresado a la pagina", "admin");
				header("location:home.php");
			}else{
				echo "<script>alert('Usuario o contrasena incorrecta')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		$conn->close();
	}	