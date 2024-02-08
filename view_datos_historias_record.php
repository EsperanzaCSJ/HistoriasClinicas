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
				<div>
				<br />			
				<a class = "btn btn-info" href = "print-atendidos.php" style = "float:right;" ><span class = "glyphicon glyphicon-print"></span> IMPRIMIR</a>
				<br />
				<br />
				</div>
				<div class = "panel-body">
					
					<table id = "table" class = "display" width = "100%" cellspacing = "0">
						<thead>
							<tr>
								<th>Nro. Historia</th>
								<th>Nombre</th>
								<th>Edad</th>
								<th>Género</th>
								<th>Dirección</th>
								<th><center>Accion</center></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$tu = "SELECT * FROM `datos_historias` NATURAL JOIN `paciente` where `idmedico`= '$fetch[idmedico]' GROUP BY `paciente_no` ORDER BY `atencion_no` DESC";
							$q = $conn->query($tu) or die(mysqli_error());
							while($f = $q->fetch_array()){
						?>
							<tr>
								<td><?php echo $f['paciente_no']?></td>
								<td><?php echo $f['firstname']." ".$f['lastname']?></td>
								<td><?php echo $f['age']?></td>
								<td><?php echo $f['genero']?></td>
								<td><?php echo $f['address']?></td>
								<td><center>
										<a href = "datos_historias_record.php?paciente_no=<?php echo $f['paciente_no']?>&atencion_no=<?php echo $f['atencion_no'] ?>"class = "btn btn-info"><span class = "glyphicon glyphicon-book"></span> Historial Clinico</a> 
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