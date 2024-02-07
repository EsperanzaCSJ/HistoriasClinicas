<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Historias Clinicas - Consultorio Medico Popular Pio Tamayo</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
		<style>
        .column {
            width: 26.6%;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
			background-color: #fff;
			border-radius: 50px;
			margin: 20px;
			padding: 20px;
			transition: transform 0.3s ease;
        }
        
        .column:hover {
            transform: scale(1.1);
        }
        
        .clear {
            clear: both;
        }
		.user-image {
            width: 80px;
            height: 80px;
        }
    </style>
	</head>
<body style="background-color:#f3f3f9;">
	<div class = "navbar navbar-default navtop">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
	</div>
	<br>
	<div  style="margin: 10%;">
		<div>
			<center><h1>Bienvenido al sistema de registro de historias clínicas para el Consultorio Médico Popular Pio Tamayo</h1></center>
			<center>				
			<br>
			<br>
				<div class="column">					
					<img src="images/icon-user-admin.png" alt="Imagen de administrador" class="user-image">
					<h2>Administrador</h2>
					<p>Ingrese como administrador para gestionar usuarios médicos y otras tareas.</p>
					<div class = "form-group">
					<a href="useradmin/index.php"><button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</button>
					</div></a>
				</div>
				
				<div class="column">
					
					<img src="images/icon-user-medico.JPG" alt="Imagen de administrador" class="user-image">
					<h2>Médico</h2>
					<p>Ingrese como Médico para administrar sus Historias clínicas y pacientes.</p>
					<div class = "form-group">
					<a href="index-medico.php"><button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</button>
					</div></a>
				</div>
				
				<div class="column">
					
					<img src="images/icon-secretary.png" alt="Imagen de administrador" class="user-image">
					<h2>Secretario</h2>
					<p>Ingrese como secretario para administrar los pacientes de su médico asignado.</p>
					<div class = "form-group">
					<a href="secretaria/index.php"><button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</button>
					</div></a>
				</div>
			</center>
			<div class="clear"></div>
		</div>	
	</div>	
		<img src = "images/salud.jpg" class = "background">			
	<?php
	require_once 'footer.php';	
?> 
</body>
<?php
	include("useradmin/script.php");
?>
</html>