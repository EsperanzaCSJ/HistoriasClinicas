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
				$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`rad_id` = '$_GET[rad_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<br />
			<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "xray_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			<br />
			<br />
			<div style = "float:left; width:30%;">	
					<label style = "font-size:15px;">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>		
				</div>
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;">Edad</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['age']?></label>		
				</div>
				<div style = "float:left; width:15%;">	
					<label style = "font-size:15px;">Estado Civil</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['civil_status']?></label>		
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:15px;">Dirección</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['address']?></label>		
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left;">
					<label for = "case_no">Case No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['case_no']?></label>
				</div>	
				<br />				
				<br />				
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "width:50%; float:left;">
					<label for = "referred_by">Referred by:ICHC</label>
					<br />
					<label class = "text-muted"><?php echo $f['referred_by']?></label>
					<br />
					<br />
					<label for = "room_bed_no">Room & Bed No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['room_bed_no']?></label>
				</div>
				<div class = "form-inline" style = "float:left; width:50%;">
					<label for = "clinical_impression">Clinical Impression:</label>
					<br />
					<label class = "text-muted"><?php echo $f['clinical_impression']?></label>
					<br />
					<br />
					<label for = "type_of_examination">Type of Examination:</label>
					<br />
					<label class = "text-muted"><?php echo $f['type_of_examination']?></label>
				<br />
				<br />
				</div>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	<?php require'script3.php'?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
	</script>
</body> 
</html>