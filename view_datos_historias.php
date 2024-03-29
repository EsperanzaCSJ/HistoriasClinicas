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
	<br />
	<br />
	<br />
	<div id= "content" class = "well">
		<div class = "panel panel-success">	
			<div class = "panel-heading">
			<?php
				$q = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$_GET[paciente_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
				$q1 = $conn->query("SELECT COUNT(*) as total FROM `cita` where `status` = 'Pending' && `paciente_no` = '$f[paciente_no]' && `section` = 'datos_historias'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
				<label class = "font-size:18px;">Información del Paciente: <label class = "text-warning;"><?php echo $f['firstname']." ".$f['lastname']?></label></label>
				<a style = "float:right; margin-top:-4px;" href = "datos_historias.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
				<a style = "float:right; margin-top:-4px; margin-right:5px;" href = "datos_historias_pending.php?paciente_no=<?php echo $f['paciente_no']?>" class = "btn btn-info">Citas Pendientes <span class = "badge"> <?php echo $f1['total']?></span></a>
				<label style = "margin-top:5px; margin-right:20px; float:right;">HISTORIA CLINICA Nro: <label class = "text-warning"><?php echo $f['paciente_no']?></label></label>
			</div>
			<div class = "panel-body">					
					<div style = "float:left; width:20%;">
						<label for = "cedula" style = "font-size:18px;">Cédula</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cedula']?></label>
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">F. Nacimiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Género</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['genero']?></label>
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Estado Civil</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['civil_status']?></label>
					</div>
					<br style = "clear:both;" />
					<hr style = "border:1px dotted #d3d3d3;"/>
					<div>
						<label style = "font-size:18px;">Dirección</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
					</div>
					<!-- <hr style = "border:1px dotted #d3d3d3;"/>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "bp">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['BP']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">
						<label style = "font-size:18px;" for = "temp">TEMP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['TEMP']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "pr">PR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['RR']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "rr">RR</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['RR']?></label>
					</div>
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "wt">WT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['WT']?></label>
					</div>	
					<div class = "form-group" style = "width:15%; float:left;">	
						<label style = "font-size:18px;" for = "ht">HT</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><//?php echo $f['HT']?></label>
					</div> -->
			</div>	
		</div>		 
	</div>
		<?php	require_once 'footer.php';?>
	</body>
		<?php	require "script.php";?>
</html>