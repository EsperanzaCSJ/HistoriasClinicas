<?php	require_once 'logincheck.php';?>
<!DOCTYPE html>
<html lang = "es_ES">
	<?php	include 'head.php';?>
	<body>
		<?php	include 'navbar.php';?>
		<?php	include 'sidebar.php';?>
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
								<input class = "form-control" name = "username" type = "text" required = "required" placeholder = "Escriba un usuario con el que ingresará">
							</div>
							<div class = "form-group">	
								<label for = "password">Contraseña: </label>
								<input class = "form-control" name = "password" maxlength = "12" type = "password" required = "required" placeholder = "Escriba la contraseña con la que ingresará">
							</div>
							<div class = "form-group">
								<label for = "firstname">Nombre: </label>
								<input class = "form-control" type = "text" name = "firstname" required = "required" placeholder = "Escriba el nombre del médico">
							</div>
							<div class = "form-group">
								<label for = "lastname">Apellidos: </label>
								<input class = "form-control" type = "text" name = "lastname" required = "required" placeholder = "Escriba el apellido del médico">
							</div>
							<div class = "form-group">
								<label for = "cimedico">Cédula: </label>
								<input class = "form-control" type = "number" name = "cimedico" placeholder = "" placeholder = "Escriba la cédula del médico" required = "required">
							</div>						
							<div class = "form-group">
							<div class = "form-inline" style = "display: none;">					 
								<label for = "section">Rol de usuario:</label>
								<input class = "form-control" type = "text" value = "Medic" name = "section" >
							</div> 
							<!-- <label for = "section">Rol de usuario: </label>
								<select name = "section" class = "form-control" required = "required">
									<option value = "">--Seleccione el rol--</option>
									<option value = "Medic">Doctor</option>
									<option value = "Secre">Secretaria</option>
								</select> -->
							</div>
							<div class = "form-group">
								<label for = "especialidad">Especialidad: </label>
								<input class = "form-control" type = "text" name = "especialidad" placeholder = "Escriba la especialidad médica del Doctor">
							</div>
							<div class = "form-group">
								<label for = "idmedico">Licencia Médica: </label>
								<input class = "form-control" type = "text" name = "idmedico" placeholder = "Escriba el número de su licencia médica" required = "required">
							</div>
							<button class = "btn btn-primary" name = "save_user" ><span class = "glyphicon glyphicon-save"></span> GUARDAR
							</button>
							<br />
							
						</div>	
						<?php require 'add_user.php'?>
						</div>
					</form>			
				</div>	
			</div>	
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<label>LISTA DE MÉDICOS</Label>
				</div>
				<div class = "panel-body">
					<button id = "show" class = "btn btn-info"><span class  = "glyphicon glyphicon-plus"></span> AGREGAR</button>
					<br />
					<br />
					<table id = "table" class = "display" width = "100%" cellspacing = "0">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Usuario</th>
								<th>Licencia Médica</th>
								<th>Cédula</th>
								<th>Especialidad</th>
								<th><center>Editar</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$query = $conn->query("SELECT * FROM `user` ORDER BY `user_id` DESC") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
							<tr>
								<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
								<td><?php echo $fetch['username']?></td>
								<td><?php echo $fetch['idmedico']?></td>
								<td><?php echo $fetch['cimedico']?></td>
								<td><?php echo $fetch['especialidad']?></td>
								<td><center><a href = "edit_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>"class = "btn btn-sm btn-warning"><i class = "glyphicon glyphicon-edit"></i></a>
								<a onclick = "delete_user(this); return false;"  href = "delete_user.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Borrar</a></center></td>
								
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
		<script type = "text/javascript">
			function delete_user(that){
				var delete_func = confirm("¿Estás seguro de que deseas eliminar este registro?")
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