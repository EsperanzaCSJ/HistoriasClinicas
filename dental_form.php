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
	<?php	require_once 'navbar2.php';
?>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>DENTAL</label></center>
			</div>
		</div>
		
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<?php 
					$q = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `dental_no` = '$_GET[dental_no]'") or die(mysqli_error());
					$f = $q->fetch_array();
				?>
				<label>DENTAL RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "dental_record.php?itr_no=<?php echo $f['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> VOLVER</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Nombre</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Edad</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Genero</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
					<div style = "float:left; width:50%;">
						<label style = "font-size:18px;">Direccion/label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Dientes/Diente</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['tooth']?></label>
					</div>	
					<div style = "float:left; width:25%;">
						<label style = "font-size:18px;">Dentista</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['dentist']?></label>
					</div>
					<br style = "clear:both;" />
					<br />
					<br />
			</div>
			<?php require'add_query.php'?>
			</form>
		</div>
		 
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	</body>
		<?php require "script.php" ?>
</html>