<?php
	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
		$section = $fetch['section'];	
			if($valid > 0){
				if($section == "datos_historias"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: home.php");
				}
				if($section == "Medic"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: home.php");
				}							
			}else{
				echo "<script>alert('La cuenta que has ingresado no existe!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
						
		
		}
		$conn->close();
	