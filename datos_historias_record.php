<?php	require_once 'logincheck.php';?>
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
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[paciente_no]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
			<div class = "panel-heading">
				<label>Historial Clinico / Paciente: <?php echo $f1['firstname']." ".$f1['lastname']?></label>
			</div>
			<div class = "panel-body">
				<table id = "table" cellspacing = "0" class = "display">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Diagnostico</th>
							<th>Nota</th>
							<th><center>Ver Detalles</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$q = $conn->query("SELECT * FROM `datos_historias` NATURAL JOIN `paciente` WHERE `paciente_no` = '$_GET[paciente_no]' ORDER BY `rehab_id` DESC") or die(mysqli_error());
						while($f = $q->fetch_array()){
					?>
						<tr>
							<td><?php echo $f['date']?></td>
							<td><?php echo $f['diagnostico']?></td>
							<td><?php echo $f['nota']?></td>
							<td><center><a class = "btn btn-info" href = "datos_historias_form.php?paciente_no=<?php echo $f['paciente_no']?>&rehab_id=<?php echo $f['rehab_id']?>"><span class = "glyphicon glyphicon-search"></span></a><center></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php	require_once 'footer.php';?>
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