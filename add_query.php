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
		$date = date('d/m/Y', strtotime('+8 HOURS'));
		$itr_no = $_POST['itr_no'];
		$idmedico = $_POST['idmedico'];
		$conn = new mysqli("localhost", 'root', '', 'hcpms') or die(mysqli_error());
		$conn->query("INSERT INTO `rehabilitation` VALUES('', '$temp', '$tension', '$wt', '$ht', '$sintomas', '$evaluacion', '$diagnostico', '$reporte_med', '$plan', '$nota', '$date', '$itr_no', '$idmedico')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Rehabilitation' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		$conn->close();
		header("location:rehabilitation.php");
	}
?>