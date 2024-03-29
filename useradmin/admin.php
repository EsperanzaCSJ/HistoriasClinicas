<?php
	require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html lang = "es_ES">
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
	require_once 'sidebar.php';
?>
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
							<input class = "form-control" id="texto1" type = "text" name = "firstname" required = "required" pattern="[A-Za-z]+">
						</div>
						<div class = "form-group">
							<label for = "lastname">Apellidos: </label>							
							<input class = "form-control" id="texto2" type = "text" name = "lastname" required = "required" pattern="[A-Za-z]+">
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
				<label>CUENTAS ADMINISTRADORAS</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> AGREGAR</button>
				<a class = "btn btn-info" href = "print-admin.php" style = "float:right;" ><span class = "glyphicon glyphicon-print"></span> IMPRIMIR</a>
				<br />
				<br />		
				<table id = "table" class = "display" cellspacing = "0"  >
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th><center>Editar</center></th>
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
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><center><a class = "btn btn-sm btn-warning" href = "edit_admin.php?id=<?php echo $fetch['admin_id']?>&lastname=<?php echo $fetch['lastname']?>"><i class = "glyphicon glyphicon-edit"></i></a>
							<!-- <a onclick="confirmationDelete(this);return false;" href = "delete_admin.php?id=<//?php echo $fetch['admin_id']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Eliminar</a> --></center></td>
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
		<?php	require_once 'footer.php';?>
	
<?php require'script.php' ?>
<script type = "text/javascript">
	function confirmationDelete(anchor)
		{
			var conf = confirm('¿Seguro que quieres eliminar este registro??');
			if(conf)
			window.location=anchor.attr("href");
		}
</script>
<script>
    var nombreInput = document.getElementById('texto1');

    nombreInput.addEventListener('input', function(event) {
      var inputValue = this.value;
      var newValue = inputValue.replace(/[0-9]/g, '');
      this.value = newValue;
    });
</script>
<script>
    var nombreInput = document.getElementById('texto2');

    nombreInput.addEventListener('input', function(event) {
      var inputValue = this.value;
      var newValue = inputValue.replace(/[0-9]/g, '');
      this.value = newValue;
    });
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