<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<?php	require_once 'head.php';
?>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" style = "float:left;" height = "55px"><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
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
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>MATERNITY</label></center>
			</div>
		</div>
		<a href = "view_birthing_record.php"  style = "float:right; margin-right:10px;" class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> BIRTHING ADMISSION RECORD</a>
		<a href = "view_prenatal_record.php"  style = "float:right; margin-right:10px;" class = "btn btn-success"><span class = "glyphicon glyphicon-book"></span> PRENATAL RECORD</a>
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>REGISTRO DE TRAMIENTO INDIVIDUAL</h4>
			</div>
		</div>
		<br />
		<table id = "table" class = "display" cellspacing = "0" >
			<thead>
				<tr>
					<th>Nro Documento de Identidad </th>
					<th>Nombre</th>
					<th>F. Nacimiento</th>
					<th>Edad</th>
					<th>Dirección</th>
					<th>Estado Civil</th>
					<th>Gender</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `gender` = 'Female' ORDER BY `itr_no` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['itr_no']?></td>
					<td><?php echo $f['firstname']." ".$f['lastname'] ?></td>
					<td><?php echo $f['birthdate'] ?></td>
					<td><?php echo $f['age'] ?></td>
					<td><?php echo $f['address'] ?></td>
					<td><?php echo $f['civil_status'] ?></td>
					<td><?php echo $f['gender'] ?></td>
					<td>
						<center>
							<a href = "view_maternity.php?itr_no=<?php echo $f['itr_no']?>"class = "btn btn-sm btn-info"><span class = "glyphicon glyphicon-search"></span> VER DETALLES</a> 
						</center>
					</td>
				</tr>
			<?php
				}
					$conn->close();
			?>	
			</tbody>
		</table>
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
</html>