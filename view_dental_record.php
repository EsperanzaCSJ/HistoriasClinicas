<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
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
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `dental` GROUP BY `itr_no` ORDER BY `dental_no` DESC") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<a style = "float:right; margin-top:-4px;" href = "dental.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
		<a style = "float:right; margin-top:-4px; margin-right:4px;" href = "dental_print.php" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>Registro Dental LIST</h4>
			</div>
		</div>
		<br />
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Nro Documento de Identidad </th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Gender</th>
					<th>Dirección</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$query = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `dental_no` DESC") or die(mysqli_error());
				while($fetch = $query->fetch_array()){
			?>
				<tr>
					<td><?php echo $fetch['itr_no']?></td>
					<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
					<td><?php echo $fetch['age']?></td>
					<td><?php echo $fetch['gender']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><center>
							<a href = "dental_record.php?itr_no=<?php echo $fetch['itr_no']?>"class = "btn btn-info"><span class = "glyphicon glyphicon-book"></span> Todos los Registros</a> 
						</center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
</html>