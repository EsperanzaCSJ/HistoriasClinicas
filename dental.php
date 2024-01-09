<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
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
		<a href = "view_dental_record.php" id = "d_record" style = "float:right; margin-right:10px;" href = "" class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> Registro Dental</a>
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>REGISTRO DE TRAMIENTO INDIVIDUAL</h4>
			</div>
		</div>
		<br />
		<table id = "table" class = "display" cellspacing = "0" >
			<thead>
				<tr>
					<th>Nro Documento de Identidad </th>
					<th>Nombre</th>
					<th>F. Nacimiento</th>
					<th>Edad</th>
					<th>Dirección</th>
					<th>Estado Civil</th>
					<th>Gender</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` ORDER BY `itr_no` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['itr_no']?></td>
					<td><?php echo $f['firstname']." ".$f['lastname'] ?></td>
					<td><?php echo $f['birthdate'] ?></td>
					<td><?php echo $f['age'] ?></td>
					<td><?php echo $f['address'] ?></td>
					<td><?php echo $f['civil_status'] ?></td>
					<td><?php echo $f['gender'] ?></td>
					<td>
						<center>
							<a href = "view_dental.php?itr_no=<?php echo $f['itr_no']?>"class = "btn btn-sm btn-info"><span class = "glyphicon glyphicon-search"></span> VER DETALLES</a> 
						</center>
					</td>
				</tr>
			<?php
				}
					$conn->close();
			?>	
			</tbody>
		</table>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
		<script src ="js/add_dental.js"></script>
</html>