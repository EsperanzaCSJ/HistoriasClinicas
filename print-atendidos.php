<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
<style>
	@media print { 
		@page {
			size:letter;
		}
}
		#print{
			width:850px;
			height:1100px;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
		}
		thead {
			background-color: #edf3ff;
		}	
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid #b7cfff;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head> 
<body>
<button onclick="printContent('print')">Imprimir</button>
<button><a style = "text-decoration:none; color:#000;" href = "view_datos_historias_record.php" class = "btn btn-info">VOLVER</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "images/logo.png" height = "80px" width = "80px" style = "float:left; position:relative; left:15%;" />
			<div style = "float:right; position:relative; right:35%;">
				<br />
				<label><center>Consultorio Médico Popular Pio Tamayo</center></label>
				<label><center>Comunidad Pio Tamayo</center></label>
				<label><center>Barquisimeto, Estado Lara, Venezuela</center></label>
			</div>
			<br style = "clear:both;" />
			<br />
			<br />
			<br />
			<label><center><b>CONSULTORIO MÉDICO POPULAR PIO TAMAYO</b></center></label>
			<label style = "font-size:14px;"><center>LISTA DE PACIENTES ATENDIDOS</center></label>
			<br />
			<br />
			<label><b>DATOS DEL MÉDICO:</b></label>
			<br />
			<label>Nombres: <?php echo $fetch['firstname']." ".$fetch['lastname']?>
			<br />
			<label>Especialidad: <?php echo $fetch['especialidad']?></label>
			<br />
			<label>Cédula: <?php echo $fetch['cimedico']?></label>

		<div id = "content">
			<div class = "panel-body">
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">						<thead>
					<tr>
						<th>Nro. Cedula</th>
						<th>Nro. Historia</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Dirección</th>
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
							</tr>
							<?php	}	?>	
						</tbody>
						</table>
			</div>
		</div>
		</div>
	</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>