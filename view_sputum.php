<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>SPUTUM</label></center>
			</div>
		</div>
		<div class = "panel panel-success">	
			<div class = "panel-heading">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
				$q1 = $conn->query("SELECT COUNT(*) as total FROM `complaints` where `status` = 'Pending' && `itr_no` = '$f[itr_no]' && `section` = 'Sputum'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
				<label>Información del Paciente / <label class = "text-warning"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label></label>
				<a style = "float:right; margin-top:-4px;" href = "sputum.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
				<a style = "float:right; margin-top:-4px; margin-right:5px;" href = "sputum_pending.php?itr_no=<?php echo $f['itr_no']?>" class = "btn btn-info">ATENCIÓN <span class = "badge"> <?php echo $f1['total']?></span></a>
				<label style = "margin-top:5px; margin-right:5px; float:right;">HISTORIA CLINICA Nro: <label class = "text-warning"><?php echo $f['itr_no']?></label></label>
			</div>
			<div class = "panel-body">
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">F. Nacimiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<div style = "float:left; width:10%;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Genero</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label style = "font-size:18px;">Estado Civil</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['civil_status']?></label>
					</div>
					<div style = "float:left; width:15%;">	
						<label style = "font-size:18px;" for = "phil_health_no">Tratamiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['phil_health_no']?></label>
					</div>
					<div style = "float:left; width:15%;">
						<label for = "family_no" style = "font-size:18px;">Nro Familia</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['family_no']?></label>
					</div>	
					<br style = "clear:both;" />
					<hr style = "border:1px dotted #d3d3d3;"/>
					<div>
						<label style = "font-size:18px;">Direccion/label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
					</div>
					<hr style = "border:1px dotted #d3d3d3;"/>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "bp">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "temp">TEMP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['TEMP']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "pr">PR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RR']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "rr">RR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RR']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "wt">WT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['WT']?></label>
					</div>	
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "ht">HT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['HT']?></label>
					</div>
					<br />
			</div>	
		</div>	
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica 2018 - <a href="http://platea21.blogspot.com/">Platea21</a></label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>