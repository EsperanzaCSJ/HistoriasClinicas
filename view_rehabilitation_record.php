<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<?php	require_once 'head.php';?>
	<body>
		<?php	require_once 'navbar2.php';?>
		<?php	require_once 'sidebar.php';?>
		<div id = "content">
			<br />
			<br />
			<br />
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<label>PACIENTES ATENDIDOS</label>
				</div>
				<br />
				<br />
				<div class = "panel-body">
					<table id = "table" class = "display" width = "100%" cellspacing = "0">
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
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$tu = "SELECT * FROM `rehabilitation` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `rehab_id` DESC";
							$q = $conn->query($tu) or die(mysqli_error());
							while($f = $q->fetch_array()){
						?>
							<tr>
								<td><?php echo $f['itr_no']?></td>
								<td><?php echo $f['firstname']." ".$f['lastname']?></td>
								<td><?php echo $f['age']?></td>
								<td><?php echo $f['gender']?></td>
								<td><?php echo $f['address']?></td>
								<td><center>
										<a href = "rehabilitation_record.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id'] ?>"class = "btn btn-info"><span class = "glyphicon glyphicon-book"></span> Historial Clínico</a> 
									</center></td>
							</tr>
						<?php
							}
						?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
</html>