<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<?php
	include 'head.php';
	$a=12;
	?>
<body>
	<?php
	include 'navbar.php';
	?>
	<?php
	include 'sidebar.php';
	?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div id = "add" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>AGREGAR MÉDICO</label>
				<button id = "hide" class = "btn btn-sm btn-danger" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span> CERRAR</button>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
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
							<label for = "lastname">Apellidos: </label>
							<input class = "form-control" type = "text" name = "lastname" required = "required">
						</div>						
						<div class = "form-group">
							<label for = "idmedico">Licencia Médica: </label>
							<input class = "form-control" type = "text" name = "idmedico" placeholder = "">
						</div>
						<div class = "form-group">
							<label for = "cimedico">Cédula: </label>
							<input class = "form-control" type = "number" name = "cimedico" placeholder = "">
						</div>		
							<button class = "btn btn-primary" name = "save_user" ><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
							<br />
					</div>	
					<?php require 'add_user.php'?>
					</div>
				</form>			
			</div>	
		</div>	
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<label>Lista de Médicos</Label>
			</div>
			<div class = "panel-body">
				<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> AGREGAR</button>
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Nombre</th>
							<th>Licencia</th>
							<th>Cédula</th>
							<th><center>Accion</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `user` ORDER BY `user_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo md5($fetch['password'])?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['idmedico']?></td>
							<td><?php echo $fetch['cimedico']?></td>
							<td><center><a href = "edit_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>"class = "btn btn-sm btn-warning"><i class = "glyphicon glyphicon-edit"></i> Actualizar</a> <a onclick = "delete_user(this); return false;"  href = "delete_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Editar</a></center></td>
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
	<script type = "text/javascript">
		function delete_user(that){
			var delete_func = confirm("Are you sure you want to delete this record?")
			if(delete_func){
				window.location = anchor.attr("href");
			}
		}
	</script>
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