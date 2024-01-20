<?php
	require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html lang = "en">lang = "eng">
	<head>
		<title>Historias Clinicas - Consultorio Medico Popular Pio Tamayo</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?> <script src="../js/script.js"></script>  </head>
<body>
	<?php
	require_once 'navbar.php';
?>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Cuentas</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrador</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> Usuarios </a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Paciente</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Secciones</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalisis</a></li>
						<li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternidad</a></li>
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematología</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Rayos X</a></li>
						<li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitacion</a></li>
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Esputo</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Análisis de orina</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		
		<br />
		<br />
		<br />
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
			$f1 = $q1->fetch_array();
		?>
		<div class = "alert alert-info">Rehabilitation Record / <?php echo $f1['firstname']." ".substr($f1['middlename'], 0, 1).". ".$f1['lastname']?><a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "rehabilitation.php"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a></div>
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Type of Disability</th>
					<th>Diagnosis</th>
					<th><center>Accion</center></th>
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
					<td><center><a class = "btn btn-info" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id']?>"><span class = "glyphicon glyphicon-search"></span> VER DETALLES</a><center></td>
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
	<?php require'script3.php'?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false,
					"order": "DESC"
				});
			});
	</script>
</body> 
</html>