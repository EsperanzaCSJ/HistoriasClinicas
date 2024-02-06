<?php
	if(ISSET($_POST['save_r'])){
		$diagnosis = $_POST['diagnosis'];
		$type_of_disability = $_POST['type_of_disability'];
		$subjective = $_POST['subjective'];
		$objective = $_POST['objective'];
		$assessment = $_POST['assessment'];
		$plan = $_POST['plan'];
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$paciente_no = $_POST['paciente_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost", 'root', '', 'hcpms') or die(mysqli_error());
		$conn->query("INSERT INTO `datos_historias` VALUES('', '$diagnosis', '$type_of_disability', '$subjective', '$objective', '$assessment', '$plan', '$date', '$paciente_no', '$user_id', '$month', '$year')") or die(mysqli_error());
		$conn->query("UPDATE `atenciones` SET `status` = 'Done' WHERE `paciente_no` = '$_GET[paciente_no]' && `section` = 'datos_historias' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_datos_historias_record.php");
		$conn->close();
	}
?>