<?php	require_once 'logincheck.php';?>
<!DOCTYPE html>
<html lang = "eng">
	<?php	require_once 'head.php';?>
	<body>
		<?php	require_once 'navbar.php';?>
		<?php	require_once 'sidebar.php';?>
		<div id = "content">			
			<br />
			<br />
			<br />
			<br />
			<div class = "panel panel-primary">			
				<div class = "panel-heading">
					<label>AUDITORIA</label>
				</div>
				<div class = "panel-body">
					<div>
						<a class = "btn btn-info" href = "print-auditoria.php" style = "float:right;" ><span class = "glyphicon glyphicon-print"></span> IMPRIMIR</a>
						<br />
						<br />
					</div>
					<table id = "table" cellspacing = "0" class = "display">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Acción</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$q = $conn->query("SELECT * FROM `auditoria` ORDER BY `usuario` DESC") or die(mysqli_error());
							while($f = $q->fetch_array()){
						?>
							<tr>
								<td><?php echo $f['usuario']?></td>
								<td><?php echo $f['accion']?></td>
								<td><?php echo $f['fecha']?></td>
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
		<?php	require_once 'footer.php';?>
		<?php	include "script.php";?>
		<script type = "text/javascript">
			$(document).ready(function() {
				function disableBack() { window.history.forward() }
				window.onload = disableBack();
				window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
			});
		</script>		
	</body>
</html>