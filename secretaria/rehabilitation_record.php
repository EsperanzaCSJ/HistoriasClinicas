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
				$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>			
			<div class = "panel-heading">
				<label>Historial Clinico / Paciente: <?php echo $f1['firstname']." ".$f1['lastname']?></label>
				<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "view_rehabilitation_record.php"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
			<div class = "panel-body">
				<table id = "table" cellspacing = "0" class = "display">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Molestias</th>
							<th>Diagnostico</th>
							<th><center>Ver Detalles</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' ORDER BY `rehab_id` DESC") or die(mysqli_error());
						while($f = $q->fetch_array()){
					?>
						<tr>
							<td><?php echo $f['date']?></td>
							<td><?php echo $f['type_of_disability']?></td>
							<td><?php echo $f['diagnosis']?></td>
							<td><center><a class = "btn btn-info" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id']?>"><span class = "glyphicon glyphicon-search"></span></a><center></td>
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
	<?php require 'script3.php'?>
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