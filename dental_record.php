<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<?php	require_once 'head.php';
?>
	<body>
	<?php	require_once 'navbar2.php';
?>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>DENTAL</label></center>
			</div>
		</div>
		<a style = "float:right; margin-top:-4px;" href = "view_dental_record.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a> 
		<br />
		<br />
		<div class = "panel panel-primary">
			<?php
				$q1 = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
			<div class = "panel-heading">
				<h4>Registro Dental / <?php echo $f1['firstname']." ".$f1['lastname']?></h4>
			</div>
			<div class = "panel-body">
				<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Dentista</th>
					<th>Diente/Dientes</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' ORDER BY `date` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo date("m/d/Y", strtotime($f['date']))?></td>
					<td><?php echo $f['dentist']?></td>
					<td><?php echo $f['tooth']?></td>
					<td><center><a class = "btn btn-info" href = "dental_form.php?itr_no=<?php echo $f['itr_no']?>&dental_no=<?php echo $f['dental_no']?>"><span class = "glyphicon glyphicon-search"></span> VER DETALLES</a><center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
			</div>
		</div>
			
		<br />
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script3.php" ?>
		<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false,
					"order": "DESC"
				});
			});
		</script>
</html>