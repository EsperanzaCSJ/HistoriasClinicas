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
		<div style = "display:none;" id = "com" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>HISTORIA CLÍNICA</label>
				<button class = "btn btn-danger" id = "hide_com" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-remove"></span>CERRAR</button>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "paciente_no">Historia Clinica Nro:</label>
						<input class = "form-control" value = "<?php echo $f['paciente_no'] ?>" disabled = "disabled" size = "3" type = "number" name = "paciente_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "cedula">Cédula</label>
						<input class = "form-control" value = "<?php echo $f['cedula'] ?>">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Nombres:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" disabled = "disabled" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Apellidos:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" disabled = "disabled" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label>Fecha:</label>
						<textarea style = "resize:none;" name = "cita" class = "form-control"></textarea>
						<br />
						<label>Motivo de la consulta:</label>
						<textarea style = "resize:none;" name = "motivo" class = "form-control"></textarea>
						<br />
						<label>Asigne un doctor:</label>
						<select name = "section" class = "form-control" required = "required">
								<option value = "">Seleccione al doctor</option>
								<option value = "datos_historias">Dr. Juancho Pacho</option>
								<option value = "datos_historias">Dra. Nicole Kidman</option>
								<!-- <option value = "Hematology">Hematology</option>
								<option value = "Prenatal">Prenatal</option>
								<option value = "Xray">Rayos X</option>
								<option value = "datos_historias">datos_historias</option>
								<option value = "Sputum">Sputum</option>
								<option value = "Urinalysis">Urinalysis</option>
								<option value = "Maternity">Maternidad</option> -->
						</select>
					</div>
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_cita"><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
					</div>
					<?php require_once 'add_cita.php' ?>
				</form>
			</div>	
		</div>	
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
		<div class = "panel panel-info">
			<div class = "panel-heading">
				<label style = "font-size:16px;">Historias Clínicas de <?php echo $fetch['firstname']." ".$fetch['lastname']?></label>
				<a style = "float:right; margin-top:-5px;" id = "add_cita" class = "btn btn-success" href = "patient.php"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
		</div>
		<button class = "btn btn-primary" id = "show_com"><i class = "glyphicon glyphicon-plus">AGREGAR</i></button>
		<div class = "panel-body">
			<?php
				$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[id]'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$q = $conn->query("SELECT * FROM `cita` WHERE `paciente_no` = '$_GET[id]' ORDER BY `status` DESC") or die(mysqli_error());	
					while($f = $q->fetch_array()){
						if($f['status'] == "Done"){
							echo "<label style = 'color:#3399f3;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>"."<label style = 'float:right; color:red;'>Done</label><br /><br /><hr style = 'border:1px solid #eee;' />";
						}
						if($f['status'] == "Pending"){
							echo "<label style = 'color:#3399f3;'>".$f['section']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['remark']."</textarea>"."<br /><br /><hr style = 'border:1px solid #eee;' />";
						}
					}
				?>
		</div>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
<?php include("script.php"); ?>
</body>
</html>