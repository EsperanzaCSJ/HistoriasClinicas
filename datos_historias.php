<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<?php	require_once 'head.php';
?>
	<body>
		<?php
			require_once 'navbar2.php';
		?>
		<?php
			include 'sidebar.php';
		?>
	<br />
	<br />
	<br />
	<div  id = "content">
		<!-- <div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>datos_historias</label></center>
			</div>
		</div>
		<a href = "view_datos_historias_record.php" id = "d_record" style = "float:right; margin-right:10px;" class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> datos_historias RECORD</a>
		<br />
		<br />-->
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>REGISTRO DE TRAMIENTO INDIVIDUAL</label>
			</div>
			<div class = "panel-body">
				<table id =  "table" class = "display"  width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Nro Historia</th>
							<th>Nro Cédula</th>
							<th>Nombre</th>
							<th>Edad</th>
							<th>Dirección</th>
							<th>Genero</th>
							<th><center>Accion</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$q = $conn->query("SELECT * FROM `paciente`  WHERE `idmedico` = '$fetch[idmedico]'") or die(mysqli_error());
						while($f = $q->fetch_array()){
					?>
						<tr>
							<td><?php echo $f['paciente_no']?></td>
							<td><?php echo $f['cedula']?></td>
							<td><?php echo $f['firstname']." ".$f['lastname'] ?></td>
							<td><?php echo $f['age'] ?></td>
							<td><?php echo $f['address'] ?></td>
							<td><?php echo $f['genero'] ?></td>
							<td>
								<center>
									<a href = "view_datos_historias.php?paciente_no=<?php echo $f['paciente_no']?>"class = "btn btn-sm btn-info"><span class = "glyphicon glyphicon-search"></span> DETALLES</a> 
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
		</div>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
	</script>
	</body>
</html>