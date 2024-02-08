<?php
		if(ISSET($_POST['save_especialidad'])){
		$nombre = $_POST['nombre']; 
		$conn = new mysqli("localhost", "root", "", "hcpms");
		$conn->query("INSERT INTO `especialidades` VALUES('', '$nombre')") or die(mysqli_error());
}
