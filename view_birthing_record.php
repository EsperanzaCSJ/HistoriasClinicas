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
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
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
		<a style = "float:right; margin-top:-4px;" href = "maternity.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a> 
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>BIRTHING ADMISSION RECORD LIST</h4>
			</div>
		</div>
		<br />
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Nro Documento de Identidad </th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Dirección</th>
					<th><center>Accion</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `birthing` LEFT JOIN `itr`  ON birthing.itr_no=itr.itr_no WHERE `gender` = 'Female'") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['itr_no']?></td>
					<td><?php echo $f['firstname']." ".$f['lastname']?></td>
					<td><?php echo $f['age']?></td>
					<td><?php echo $f['address']?></td>
					<td><center>
							<a href = "birthing_record.php?itr_no=<?php echo $f['itr_no']?>&birth_id=<?php echo $f['birth_id'] ?>"class = "btn btn-sm btn-info"><span class = "glyphicon glyphicon-book"></span> Todos los Registros</a>						
					</center></td>
				</tr>
			<?php
				}
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