<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?> <script src="../js/script.js"></script>  </head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Sistema de Historias Clinicas y Registro de Pacientes - Hospital & Clinica</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Cuentas</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrador</a></a></li>
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
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>AGREGAR ADMINISTRADOR</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CERRAR</button>
			</div>
			<div class = "panel-body">
				<form id = "form_admin" method = "POST" enctype = "multi-part/form-data" >
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Usuario: </label>
							<input class = "form-control" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Contraseña: </label>
							<input class = "form-control" name = "password" maxlength = "12" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Nombre: </label>
							<input class = "form-control" type = "text" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "middlename">Segundo Nombre: </label>
							<input class = "form-control" type = "text" placeholder = "(Opcional)" name = "middlename">
						</div>
						<div class = "form-group">
							<label for = "lastname">Apellidos: </label>
							<input class = "form-control" type = "text" name = "lastname">
						</div>
							<button  class = "btn btn-primary" name = "save_admin" ><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
							<br />
					</div>
					<?php require 'add_admin.php' ?>					
					</div>
				</form>
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>CUENTAS / ADMINISTRADOR</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> AGREGAR</button>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Nombre</th>
							<th><center>Accion</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `admin` ORDER BY `admin_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo md5($fetch['password'])?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><center><a class = "btn btn-sm btn-warning" href = "edit_admin.php?id=<?php echo $fetch['admin_id']?>&lastname=<?php echo $fetch['lastname']?>"><i class = "glyphicon glyphicon-edit"></i> Actualizar</a> <a onclick="confirmationDelete(this);return false;" href = "delete_admin.php?id=<?php echo $fetch['admin_id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Eliminar</a></center></td>
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
	
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('¿Seguro que quieres eliminar este registro??');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>