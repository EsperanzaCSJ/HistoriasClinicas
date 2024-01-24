<?php
	if(ISSET($_POST['save_r'])){
		$diagnosis = $_POST['diagnosis'];
		$type_of_disability = $_POST['type_of_disability'];
		$subjective = $_POST['subjective'];
		$objective = $_POST['objective'];
		$assessment = $_POST['assessment'];
		$plan = $_POST['plan'];
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$itr_no = $_POST['itr_no'];
		$user_id = $_POST['user_id'];
		$month = date("M", strtotime("+8 HOURS"));
		$year = date("Y", strtotime("+8 HOURS"));
		$conn = new mysqli("localhost", 'root', '', 'hcpms') or die(mysqli_error());
		$conn->query("INSERT INTO `rehabilitation` VALUES('', '$diagnosis', '$type_of_disability', '$subjective', '$objective', '$assessment', '$plan', '$date', '$itr_no', '$user_id', '$month', '$year')") or die(mysqli_error());
		$conn->query("UPDATE `complaints` SET `status` = 'Done' WHERE `itr_no` = '$_GET[itr_no]' && `section` = 'Rehabilitation' && `com_id` = '$_GET[comp_id]'") or die(mysqli_error());
		header("location:view_rehabilitation_record.php");
		$conn->close();
	}
?>