<!DOCTYPE html>
<html lang = "eng">
<?php
	require_once 'head.php';
?> 
<body>
	<div class = "navbar navbar-default">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
	</div>
	<div id = "top" class = "login">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><h1 class = "panel-title">User Admin</a></h1></center>
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
		<?php 
		require_once 'footer.php';	
	?>
</body>
<?php
	include("script.php");
?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
</html>