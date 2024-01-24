<?php
	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `secretaria` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
		$section = $fetch['section'];	
			if($valid > 0){
				if($section == "Secre"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: home.php");
				}					
			}else{
				echo "<script>alert('Usuario no existe!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
						
		
		}
		$conn->close();
	