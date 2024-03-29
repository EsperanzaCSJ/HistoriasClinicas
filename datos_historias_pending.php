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
	<div id="content" class = "well">
		<div class = "panel panel-success">
			<div class = "panel-heading">
				<label>CITAS PENDIENTES</label>
				<a style = "float:right; margin-top:-4px;" href = "view_datos_historias.php?paciente_no=<?php echo $_GET['paciente_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
			<div class = "panel-body">
			<?php
				$id = $_GET['paciente_no'];
				$q1 = $conn->query("SELECT * FROM `paciente` WHERE `paciente_no` = '$id'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$q = $conn->query("SELECT * FROM `cita` WHERE `section` = 'datos_historias' && `paciente_no` = '$id' ORDER BY `status` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
					if($f['status'] == 'Pending'){
						echo "<label style = 'color:#419641;'>".$f['cita']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['motivo']."</textarea>"."<br /><a class = 'btn btn-primary' href = 'datos_historias_not.php?paciente_no=".$id."&comp_id=".$f['com_id']."'><span class = 'glyphicon glyphicon-check'></span> Agregar Historia</a><br /><br />";
					}else{
						echo "<label style = 'color:#419641;'>".$f['cita']."</label>"."<textarea  style = 'resize:none;' disabled = 'disabled' class = 'form-control'>".$f['motivo']."</textarea>"."<br /><a class = 'btn btn-primary' disabled = 'disabled'><span class = 'glyphicon glyphicon-check'></span> Done</a><br /><br />";
					}
				}	
			?>
		</div>
	</div>
		<?php	require_once 'footer.php';?>
	</body>
		<?php	require "script.php";?>
</html>