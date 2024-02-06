<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die("Conexión fallida: " . mysqli_connect_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html lang = "en">
	<?php require "head.php" ?>
	<body>
	<?php require "navbar2.php" ?>
	<br />
	<br />
	<br />
	<div class = "well">		
		<div class = "panel panel-success">
			<div class = "panel-heading">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `datos_historias` NATURAL JOIN `paciente` WHERE `atencion_no` = '$_GET[atencion_no]' && `paciente_no` = '$_GET[paciente_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<label>HISTORIA CLÍNICA</label>	
				<a style = "float:right; margin-top:-4px;" href = "datos_historias_record.php?paciente_no=<?php echo $f['paciente_no']?>&atencion_no=<?php echo $f['atencion_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "datos_historias_print.php?paciente_no=<?php echo $f['paciente_no']?>&atencion_no=<?php echo $f['atencion_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> Imprimir Historia</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "recipe_print.php?paciente_no=<?php echo $f['paciente_no']?>&atencion_no=<?php echo $f['atencion_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> Imprimir Recipe</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
					<div style = "width:35%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['lastname']?></label>
					</div>
					<div style = "width:15%; float:left;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;">Genero</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:25%; float:left;">
						<label style = "font-size:18px;">F. Nacimiento</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['birthdate']?></label>
						<br />
					<br style = "clear:both;"/>	
					</div>
					<div style = "float:left; width:100%;">
						<label style = "font-size:18px;">Direccion</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
					<br style = "clear:both;"/>					
					<hr style = "border:1px dotted #d3d3d3;" />
					</div>			
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Temperatura:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['temp']?></label><label>&deg;C</label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Tensión:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['tension']?></label><label>mm Hg</label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Altura</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ht']?></label><label>cm</label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Peso:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['wt']?></label><label>Kg</label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<center><h3 style = "color:#3C763D;"><u>NOTAS DEL MÉDICO</u></h3></center>
				</div>
				<div class = "form-group">
					<label>Sintomatología:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['sintomas']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Evaluación:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['evaluacion']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Diagnóstico:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['diagnostico']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Reporte Médico:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['reporte_med']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Recipe:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['plan']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>nota:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['nota']?></div>
				</div>
				<br />
				<br />
			</div>
			</form>
		</div>		 
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
</html>