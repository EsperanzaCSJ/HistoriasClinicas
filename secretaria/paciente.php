<?php
ob_start();
?>
<?php
	require_once 'logincheck.php';

	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT `idmedico` FROM `secretaria` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$query2 = $conn->query("SELECT * FROM `user` WHERE `idmedico` = '$fetch[idmedico]'") or die(mysqli_error());
	$fetch2 = $query2->fetch_array();
?>
<!DOCTYPE html>
<html lang = "es_ES">
	<?php	require_once 'head.php';?> 
	<body>
		<?php   require_once 'navbar2.php';?>
		<?php	include 'sidebar.php';?>
		<div id = "content">
			<br />
			<br />
			<br />
			<div style = "display:none;" id = "add_paciente" class = "panel panel-success">	
				<div class = "panel-heading">
					<label>AGREGAR PACIENTE</label>
					<button id = "hide_paciente" style = "float:right; margin-top:-4px;" class = "btn btn-sm btn-danger"><span class = "glyphicon glyphicon-remove"></span> Cerrar</button>
				</div>
				<div class = "panel-body">
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
					<div class = "form-inline" style = "display: none;">					 
						<label for = "idmedico">Médico asignado:</label>
						<input class = "form-control" type = "text" value = "<?php echo $fetch2['idmedico'] ?>" name = "idmedico" >
					</div> 
						<div style = "float:left;" class = "form-inline">
							<label for = "cedula">Nro. Cédula:</label>
							<select  class = "form-control" name = "nacionalidad" required = "required">
								<option value = "V">V</option>
								<option value = "E">E</option>
							</select>
							<input class = "form-control" placeholder = "" min = "2700000" max = "99000000" type = "number" name = "cedula">
						</div>
						<br />
						<br />
						<br />
						<div style = "float:left;" class = "form-inline">
							<label for = "paciente_no">Nro. Historia:</label>
							<input class = "form-control" size = "3" min = "0" type = "number" name = "paciente_no">
						</div> 
						<br />
						<br />
						<br />
						<div class = "form-inline">
							<label for = "firstname">Nombres:</label>
							<input class = "form-control" name = "firstname" type = "text" required = "required">
							&nbsp;&nbsp;&nbsp;
							<label for = "lastname">Apellidos:</label>
							<input class = "form-control" name = "lastname" type = "text" required = "required">
						</div>
						<br />
						<div class = "form-group">
							<label for = "birthdate" style = "float:left;">F. Nacimiento:</label>
							<br style = "clear:both;" />
							<input type="date" name="birthdate" class = "form-control" style = "width:30%; float:left;"/>							
							<br style = "clear:both;"/>
							<br />							
							<label for = "address">Direccion:</label>
							<input class = "form-control" name = "address" type = "text" required = "required">
							<br />
							<label for = "civil_status">Estado Civil:</label>
							<select style = "width:22%;" class = "form-control" name = "civil_status" required = "required">
								<option value = "">Seleccionar</option>
								<option value = "Soltero(a)">Soltero(a)</option>
								<option value = "Casado(a)">Casado(a)</option>
								<option value = "Divorciado(a)">Divorciado(a)</option>
								<option value = "Viudo(a)">Viudo(a)</option>
							</select>
							<br />
							<label for = "gender">Genero:</label>
							<select style = "width:22%;" class = "form-control" name = "gender" required = "required">
								<option value = "">Seleccionar</option>
								<option value = "Masculino">Masculino</option>
								<option value = "Femenino">Femenino</option>
							</select>
						</div>
						<br />
						<div class = "form-inline">
							<button class = "btn btn-primary" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> Guardar</button>
						</div>
					</form>
				</div>	
			</div>	
			<?php require 'add_paciente.php'?>
			<div class = "panel panel-primary">
				<div class = "panel-heading">
					<label>LISTA DE PACIENTES</Label>
				</div>
				<div class = "panel-body">
					<button id = "show_paciente" class = "btn btn-info"><span class = "glyphicon glyphicon-plus"></span> AGREGAR PACIENTE</button>
					<br />
					<br />
					<table id = "table" class = "display" width = "100%" cellspacing = "0">
						<thead>
							<tr>
								<th>Nro. Cedula</th>
								<th>Nro. Historia</th>
								<th>Nombre</th>
								<th>Edad</th>
								<th>Dirección</th>
								<th><center>Acción</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
							// echo $_SESSION['user_id'];
							// VAR_dump($_SESSION);
							// die;
							$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
							$query = $conn->query("SELECT * FROM `paciente` WHERE `idmedico` = '$fetch[idmedico]' ORDER BY `paciente_no` DESC") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
							$id = $fetch['paciente_no'];
							$q = $conn->query("SELECT COUNT(*) as total FROM `atenciones` where `paciente_no` = '$id' && `status` = 'Pending'") or die(mysqli_error());
							$f = $q->fetch_array();
							?>
							<tr>
								<td><?php echo $fetch['cedula']?></td>
								<td><?php echo $fetch['paciente_no']?></td>
								<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
								<td><?php echo $fetch['age']?></td>
								<td><?php echo $fetch['address']?></td>
								<td><center><a href = "atenciones.php?id=<?php echo $fetch['paciente_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-info">Atenciones <span class = "badge"><?php echo $f['total']?></span></a>
								<a href = "edit_paciente.php?id=<?php echo $fetch['paciente_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span>   Editar</a>
								<!-- <a href = "delete_paciente.php?id=<?php //echo $fetch['paciente_no']?>&lastname=<?php //echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Borrar</a></center></td> -->
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
<?php
ob_end_flush();
?>