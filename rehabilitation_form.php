<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
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
				$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `rehab_id` = '$_GET[rehab_id]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<label>REHABILITATION RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "rehabilitation_record.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "rehabilitation_print.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $f['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> Imprimir</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
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
					<label style = "font-size:18px;">Temperatura:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['TEMP']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Tensión:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['PR']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Altura</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['HT']?></label>
				</div>
				<div style = "width:20%; float:left;">
					<label style = "font-size:18px;">Peso:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['WT']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<center><h3 style = "color:#3C763D;"><u>NOTAS DEL MÉDICO</u></h3></center>
				</div>
				<div class = "form-group">
					<label>Motivo de la consulta:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['subjective']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Diagnostico:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['diagnostico']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Evaluación:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['objective']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Reporte Médico:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['assessment']?></div>
				</div>
				<br />
				<div class = "form-group">
					<label>Recipe:</label>
					<div style = "word-wrap:break-word;"><?php echo $f['plan']?></div>
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