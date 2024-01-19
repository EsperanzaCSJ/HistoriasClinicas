<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
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
<?php
	include 'sidebar.php';
?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>AGREGAR USUARIO</label>
				<a href = "user.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> Regresar</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Usuario: </label>
							<input class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Contraseña: </label>
							<input class = "form-control" name = "password" maxlength = "12" value = "<?php echo $fetch['password']?>" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Nombres: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['firstname']?>" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "lastname">Apellidos: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['lastname']?>" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "section">Rol de usuario: </label>
							<select name = "section" class = "form-control" required = "required">
								<option value = "">--Seleccione el rol--</option>
								<option value = "Dental">Doctor</option>
								<option value = "Fecalysis">Secretaria</option>
							</select>
						</div>
						<div class = "form-group">
							<label for = "especialidad">Especialidad: </label>
							<input class = "form-control" type = "text" name = "especialidad" placeholder = "Si es doctor: escriba su especialidad. Si es secretaria: escriba 'secretaria'" value = "<?php echo $fetch['especialidad']?>">
						</div>				
						<div class = "form-group">
							<label for = "idmedico">Licencia Médica: </label>
							<input class = "form-control" type = "text" name = "idmedico" placeholder = "" value = "<?php echo $fetch['idmedico']?>">
						</div>
						<div class = "form-group">
							<label for = "cimedico">Cédula: </label>
							<input class = "form-control" type = "number" name = "cimedico" placeholder = "" value = "<?php echo $fetch['cimedico']?>">
						</div>		
							<button class = "btn btn-warning" name = "edit_user" ><span class = "glyphicon glyphicon-edit"></span> GUARDAR</button>
							<br />
					</div>	
					<?php require 'edit_query.php'?>
					</div>
				</form>			
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