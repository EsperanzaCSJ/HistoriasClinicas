<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Historias Clinicas - Consultorio Medico Popular Pio Tamayo</title>
		<meta charset = "utf-8" />
		<link rel = "shortcut icon" href = "images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navtop">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div  class = "login">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">Iniciar Sesión</a></h1></center>
			</div>
			<div class = "panel-body">
				<form enctype = "multipart/form-data" action = "login.php" role = "form" method = "POST">
					<div class = "form-group">
						<label for = "username">Usuario</label>
						<input class = "form-control" name = "username" placeholder = "Usuario" type = "text" required = "required" >
					</div>
					<div class = "form-group">
						<label for = "password">Contraseña</label>
						<input class = "form-control" name = "password" placeholder = "Contraseña" type = "password" required = "required" >
					</div>
					<div class = "form-group">
						<button class = "btn btn-block btn-success"  name = "login"><span class = "glyphicon glyphicon-log-in"></span> Iniciar Sesión</label>
					</div>
				</form>
			</div>
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