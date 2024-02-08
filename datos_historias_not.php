<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<?php	require_once 'head.php';?>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
		</ul>
	</div>
	<?php	require_once 'sidebar.php';?>
	<div id="content" class = "well">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>HISTORIA CLÍNICA</label>	<a style = "float:right; margin-top:-4px;" href = "datos_historias_pending.php?paciente_no=<?php echo $_GET['paciente_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> REGRESAR</a>
			</div>
			<div class = "panel-body">
				<form method = "POST" enctype = "multipart/form-data" cellspacing = "0">
					<?php
						$q = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[paciente_no]'") or die(mysqli_error());
						$q1 = $conn->query("SELECT * FROM `cita` WHERE `com_id` = '$_GET[comp_id]' && `paciente_no` = '$_GET[paciente_no]' && `section` = 'datos_historias'") or die(mysqli_error());
						$f1 = $q1->fetch_array();
						$f = $q->fetch_array();
					?>
					<div style = "width:40%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['lastname']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Género</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['genero']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">F. Nacimiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
					<div style = "float:left; width:100%;">
						<label style = "font-size:18px;">Dirección de vivienda</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
					</div>			
					<br style = "clear:both;"/>
					<hr style = "border:1px dotted #d3d3d3;" />
					<div class = "form-inline">
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;"  for = "temp">Temperatura</label>
						<br />
						<input style = "width:30%;" class = "form-control" name = "temp" type = "number" required = "required"><label>&deg;C</label>
						&nbsp;&nbsp;&nbsp;
					</div>
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;"  for = "tension">Tensión</label>
						<br />
						<input style = "width:30%;" class = "form-control" name = "tension" type = "number" required = "required"><label>mm Hg</label>
						&nbsp;&nbsp;&nbsp;
					</div>
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;"  for = "wt">Peso</label>
						<br />
						<input style = "width:30%;" class = "form-control" name = "wt" type = "number" required = "required"><label>Kg</label>
						&nbsp;&nbsp;&nbsp;
					</div>
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;"  for = "ht">Altura</label>
						<br />
						<input style = "width:30%;" class = "form-control" name = "ht" type = "number" required = "required"><label>cm</label>
						&nbsp;&nbsp;&nbsp;
					</div>
					<br style = "clear:both;"/>
					<hr style = "border:1px dotted #d3d3d3;" />
					</div>
					<br />
					<div class = "form-group">
						<label>Sintomatología:</label>
						<textarea name = "sintomas" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Evaluación:</label>
						<textarea name = "evaluacion" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Diagnóstico:</label>
						<textarea name = "diagnostico" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Reporte Médico:</label>
						<textarea name = "reporte_med" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Tratamiento:</label>
						<textarea name = "plan" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Nota:</label>
						<textarea name = "nota" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<div class = "form-inline" style = "display: none;">					 
						<label for = "paciente_no">Número de historia/Paciente:</label>
						<input class = "form-control" type = "text" value = "<?php echo $_GET['paciente_no'] ?>" name = "paciente_no" >
					</div>
					<div class = "form-inline" style = "display: none;">					 
						<label for = "idmedico">Usuario médico asignado:</label>
						<input class = "form-control" type = "text" value = "<?php echo $fetch['idmedico'] ?>" name = "idmedico" >
					</div>
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_r" ><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
					</div>
				</form>
			</div>
		</div>		 
	</div>	
	<?php require 'add_query.php';?>
</body>
	<?php	require_once 'footer.php';?>
	<?php	require "script.php";?>
</html>