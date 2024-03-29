<?php
ob_start();
?>
<?php
	require_once 'logincheck.php';
?>
<!DOCTYPE html>
<html lang = "es_ES">
<?php
	require_once 'head.php';	
?> 
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
		<div style = "display:none;" id = "add_paciente" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>AGREGAR PACIENTE</label>
				<button id = "hide_paciente" style = "float:right; margin-top:-4px;" class = "btn btn-sm btn-danger"><span class = "glyphicon glyphicon-remove"></span> Cerrar</button>
			</div>
			<div class = "panel-body">
				<form id = "form_dental" method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "cedula">Nro. Cédula:</label>
						<select  class = "form-control" name = "nacionalidad" required = "required">
							<option value = "Venezolano">V</option>
							<option value = "Extrangero">E</option>
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
						
						<select name = "day" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Dia</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "month" style = "width:15%; float:left;" class = "form-control" required = "required">
							<option value = "">Mes</option>
							<option value = "01">Enero</option>
							<option value = "02">Febrero</option>
							<option value = "03">Marzo</option>
							<option value = "04">Abril</option>
							<option value = "05">Mayo</option>
							<option value = "06">Junio</option>
							<option value = "07">Julio</option>
							<option value = "08">Agosto</option>
							<option value = "09">Septiembre</option>
							<option value = "10">Octubre</option>
							<option value = "11">Noviembre</option>
							<option value = "12">Diciembre</option>
						</select>
						<select name = "year" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Año</option>
							<?php
								$a = date('Y');
								// $a = "2024";
								while(1910 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
						<br style = "clear:both;"/>
						<br />
						<!-- <label for = "phil_health_no">Motivo de la Consulta:</label>
						<input name = "phil_health_no" placeholder = "tratamiento" class = "form-control" type = "text"> -->
						<label for = "age">Edad:</label>						
						<input class = "form-control" style = "width:20%;" min = "0" max = "999" name = "age" type = "number">
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
						<label for = "genero">Genero:</label>
						<select style = "width:22%;" class = "form-control" name = "genero" required = "required">
							<option value = "">Seleccionar</option>
							<option value = "Masculino">Masculino</option>
							<option value = "Femenino">Femenino</option>
						</select>
					</div>
					<br />
					<!-- <div class = "form-inline">
						<label for = "temp">Temperatura:</label>
						<input class = "form-control" name = "temp" type = "number" max = "999" min = "0" size = "15" required = "required"><label>&deg;C</label>
						&nbsp;&nbsp;&nbsp;
						<br />
						<br />
						<label for = "tension">Tensión:</label>
						<input class = "form-control" name = "tension" type = "number" max = "300" min = "0"  required = "required"><label>mm Hg</label>
						&nbsp;&nbsp;&nbsp;
						<br />
						<br />
						<label for = "wt">Peso:</label>
						<input class = "form-control" name = "wt" style = "width:10%;" type = "number"  required = "required"><label>kg</label>
						&nbsp;&nbsp;&nbsp;
						<br />
						<br />
						<label for = "ht">Altura:</label>
						<input class = "form-control" name = "ht" style = "margin-right:10px;" type = "text"  required = "required"><label>cm</label>
					</div>
					<br /> -->
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_patient"><span class = "glyphicon glyphicon-save"></span> Guardar</button>
					</div>
				</form>
			</div>	
		</div>	
		<?php require '../add_patient.php'?>
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
							<th>F. Nacimiento</th>
							<th>Edad</th>
							<th>Dirección</th>
							<th><center>Acción</center></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `paciente` ORDER BY `paciente_no` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
						$id = $fetch['paciente_no'];
						$q = $conn->query("SELECT COUNT(*) as total FROM `cita` where `paciente_no` = '$id' && `status` = 'Pending'") or die(mysqli_error());
						$f = $q->fetch_array();
					?>
						<tr>
							<td><?php echo $fetch['cedula']?></td>
							<td><?php echo $fetch['paciente_no']?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['birthdate']?></td>				
							<td><?php echo $fetch['age']?></td>				
							<td><?php echo $fetch['address']?></td>
							<td><center><a href = "cita.php?id=<?php echo $fetch['paciente_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-info">Historial <span class = "badge"><?php echo $f['total']?></span></a> 
							<a href = "edit_patient.php?id=<?php echo $fetch['paciente_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-warning"><span class = "glyphicon glyphicon-pencil"></span>   Editar</a>
							<a href = "delete_patient.php?id=<?php echo $fetch['paciente_no']?>&lastname=<?php echo $fetch['lastname']?>" class = "btn btn-sm btn-danger"><i class = "glyphicon glyphicon-remove"></i> Borrar</a></center></td>
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