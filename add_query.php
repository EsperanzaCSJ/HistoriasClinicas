<?php
	if(ISSET($_POST['save_r'])){
		$temp = $_POST['temp'];
		$tension = $_POST['tension'];
		$wt = $_POST['wt'];
		$ht = $_POST['ht'];
		$sintomas = $_POST['sintomas'];
		$evaluacion = $_POST['evaluacion'];
		$diagnostico = $_POST['diagnostico'];
		$reporte_med = $_POST['reporte_med'];
		$plan = $_POST['plan'];
		$nota = $_POST['nota'];
		$date = date('Y/m/d', strtotime('+8 HOURS'));
		$paciente_no = $_POST['paciente_no'];
		$idmedico = $_POST['idmedico'];
		$conn = new mysqli("localhost", 'root', '', 'hcpms') or die(mysqli_error());
		$conn->query("INSERT INTO `datos_historias` VALUES('', '$temp', '$tension', '$wt', '$ht', '$sintomas', '$evaluacion', '$diagnostico', '$reporte_med', '$plan', '$nota', '$date', '$paciente_no', '$idmedico')") or die(mysqli_error());
		$conn->query("UPDATE `cita` SET `status` = 'Done' WHERE `paciente_no` = '$_GET[paciente_no]' && `section` = 'datos_historias' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		$conn->close();
		header("location:datos_historias.php");
	}
?>