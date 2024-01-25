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
				<label>HISTORIA CLÍNICA</label>	<a style = "float:right; margin-top:-4px;" href = "rehabilitation_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> REGRESAR</a>
			</div>
			<br />
			<br />
			<div class = "panel-body">
				<form method = "POST" enctype = "multipart/form-data" cellspacing = "0">
					<?php
						$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
						$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Rehabilitation'") or die(mysqli_error());
						$f1 = $q1->fetch_array();
						$f = $q->fetch_array();
					?>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['lastname']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Genero</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:15%; float:left;">
						<label style = "font-size:18px;">F. Nacimiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<div style = "float:left; width:35%;">
						<label style = "font-size:18px;">Direccion</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Temp:</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['TEMP']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Pulse</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['PR']?></label>
					</div>
					<div style = "width:40%; float:left;">
						<label style = "font-size:18px;">RR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RR']?></label>
					</div>
					<br style = "clear:both;"/>
					<hr style = "border:1px dotted #d3d3d3;" />
					<!-- <div class = "form-inline">
						<label>Diagnosis:</label>
						<input type = "text" name = "diagnosis" class = "form-control" />
						<label style = "margin-left:10px;">Type of Disability:</label>
						<input type = "text" name = "type_of_disability" class = "form-control" />
					</div> -->
					<div class = "form-inline">
						<center><h3 style = "color:#3C763D;"><u>NOTAS DEL MÉDICO</u></h3></center>
					</div>
					<br />
					<div class = "form-group">
						<label>Motivo de la consulta:</label>
						<textarea name = "subjective" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Diagnostico:</label>
						<textarea name = "Diagnostico" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Evaluación:</label>
						<textarea name = "objective" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Reporte Médico:</label>
						<textarea name = "assessment" class = "form-control" style = "resize:none;"></textarea>
					</div>
					<br />
					<div class = "form-group">
						<label>Recipe:</label>
						<textarea name = "plan" class = "form-control" style = "resize:none;"></textarea>
						<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" />
						<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
					</div>
					<br />
					<br />
					<div class = "form-inline">
						<button class = "btn btn-primary" name = "save_r" ><span class = "glyphicon glyphicon-save"></span> GUARDAR</button>
					</div>
				</form>
			</div>
		</div>		 
	</div>	
	<?php require 'add_query.php'?>
</body>
		<?php	require_once 'footer.php';?>
		<?php	require "script.php";?>
</html>