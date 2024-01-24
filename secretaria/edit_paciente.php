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
	require_once 'navbar2.php';
?>
<?php
	include 'sidebar.php';
?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
			<div class = "panel-heading">
				<label>EDITAR INFORMACIÓN DEL PACIENTE</label>
				<a style = "float:right; margin-top:-4px;" href = "paciente.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> Regresar</a>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">Nro Historia:</label>
						<input class = "form-control" value = "<?php echo $f['itr_no'] ?>" size = "3" type = "number" name = "itr_no">
					</div>
					<br />
					<br />
					<br />
					<div style = "float:left;" class = "form-inline">
						<label for = "cedula">Nro Cédula:</label>
						<select  class = "form-control" name = "nacionalidad" required = "required" value = "<?php echo $f['nacionalidad']?>">
							<option value = "V">V</option>
							<option value = "E">E</option>
						</select>
						<input class = "form-control"  min = "2700000" max = "99000000" value = "<?php echo $f['cedula']?>" type = "number" name = "cedula">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Nombres:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" type = "text" required = "required">						
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Apellidos:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label for = "birthdate" style = "float:left;">F. Nacimiento:</label>
						<br style = "clear:both;" />
						<input type="date" name="birthdate" class = "form-control" style = "width:30%; float:left;" value = "<?php echo $f['birthdate']?>"/>
						<!-- <select name = "month" style = "width:15%; float:left;" class = "form-control" required = "required" >
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
						<select name = "day" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Día</option>
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
								
								//$a = 10;
								//while($a <= 31){
								//	echo "<option value = '".$a."'>".$a++."</option>";
								//}
							?>
						</select>
						<select name = "year" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Año</option>
							<?php
								//$a = date('Y');
								// $a = "2024";
								//while(1910 <= $a){
								//	echo "<option value = '".$a."'>".$a--."</option>";
								//}
							?>
						</select> -->
						<br style = "clear:both;"/>
						<br />
						<!-- <label for = "phil_health_no">Tratamiento:</label>
						<input name = "phil_health_no" class = "form-control" value = "<?php // echo $f['phil_health_no']?>" type = "text">
						<br /> -->
						<label for = "address">Dirección:</label>
						<input class = "form-control" name = "address" type = "text" value = "<?php echo $f['address']?>" required = "required">
						<br />
						<label for = "age">Edad:</label>
						<input class = "form-control" style = "width:20%;" value = "<?php echo $f['age']?>" name = "age" type = "number">
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
						<button class = "btn btn-warning" name = "edit_patient"><span class = "glyphicon glyphicon-pencil"></span> Guardar</button>
					</div>
					<?php require_once 'edit_query.php' ?>
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
<?php
ob_end_flush();
?>