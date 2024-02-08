<?php ob_start();?>
<?php	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "es_ES">
	<?php	require_once 'head.php';?>
	<body>
		<?php	require_once 'navbar2.php';?>
		<?php	require_once 'sidebar.php';?>
		<div id = "content">
			<br />
			<br />
			<br />
			<div id = "add" class = "panel panel-success">	
				<div class = "panel-heading">
					<label>AGREGAR SECRETARIO</label>
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
								<input class = "form-control" id="texto1" type = "text" name = "firstname" required = "required">
							</div>
							<div class = "form-group">
								<label for = "lastname">Apellidos: </label>
								<input class = "form-control" id="texto2" type = "text" name = "lastname" required = "required">
							</div>
							<div class = "form-group">
								<label for = "ci_secretaria">Cédula: </label>
								<input class = "form-control" type = "number" name = "ci_secretaria" placeholder = "">
							</div>						
							<div class = "form-inline" style = "display: none;">					 
								<label for = "section">Rol de usuario:</label>
								<input class = "form-control" type = "text" value = "Secre" name = "section" >
							</div> 
							<!-- <div class = "form-group">
							<label for = "section" value = "Secre">Rol de usuario: </label>
								<select name = "section" class = "form-control" required = "required">
									<option value = "">--Seleccione el rol--</option>
									<option value = "Medic">Doctor</option>
									<option value = "Secre">Secretaria</option>
								</select>
							</div> -->
							<div class = "form-inline" style = "display: none;">					 
								<label for = "idmedico">Médico asignado:</label>
								<input class = "form-control" type = "text" value = "<?php echo $fetch['idmedico'] ?>" name = "idmedico">
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
					<label>LISTA DE SECRETARIOS</Label>
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
								<th>Cédula</th>
								<th><center>Editar</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$query = $conn->query("SELECT * FROM `secretaria` WHERE `idmedico` = '$fetch[idmedico]'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
							<tr>
								<td><?php echo $fetch['username']?></td>
								<td><?php echo md5($fetch['password'])?></td>
								<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
								<td><?php echo $fetch['ci_secretaria']?></td>
								<td><center><a href = "edit_user_secretario.php?id=<?php echo $fetch['user_id']?>&lastname=<?php echo $fetch['lastname']?>"class = "btn btn-sm btn-warning"><i class = "glyphicon glyphicon-edit"></i></a>
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
		<?php	include("script.php");?>
		<script type = "text/javascript">
			$(document).ready(function() {
				function disableBack() { window.history.forward() }

				window.onload = disableBack();
				window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
			});
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
	</body>
</html>