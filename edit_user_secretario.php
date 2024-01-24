<?php	require_once 'logincheck.php';?>
<!DOCTYPE html>
<html lang = "es_ES">
	<?php	require_once 'head.php';?>
<body>
	<?php	require_once 'navbar2.php';?>
	<?php	include 'sidebar.php';?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
		<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$query = $conn->query("SELECT * FROM `secretaria` WHERE `user_id` = '$_GET[id]'") or die(mysqli_error());
			$fetch = $query->fetch_array();
		?>
			<div class = "panel-heading">
				<label>EDITAR SECRETARIO</label>
				<a href = "user_secretario.php" class = "btn btn-sm btn-info" style = "float:right; margin-top:-5px;"><span class = "glyphicon glyphicon-hand-right"></span> Regresar</a>
			</div>
			<div class = "panel-body">
				<form id = "form_user" method = "POST" enctype = "multi-part/form-data">
					<div class = "panel panel-default" style = "width:60%; margin:auto;">
					<div class = "panel-heading">
					</div>
					<div class = "panel-body">
						<div class = "form-group">
							<label for = "username">Usuario: </label>
							<input class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" type = "text" required = "required">
						</div>
						<div class = "form-group">	
							<label for = "password">Contraseña: </label>
							<input class = "form-control" name = "password" maxlength = "12" value = "<?php echo $fetch['password']?>" type = "password" required = "required">
						</div>
						<div class = "form-group">
							<label for = "firstname">Nombres: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['firstname']?>" name = "firstname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "lastname">Apellidos: </label>
							<input class = "form-control" type = "text" value = "<?php echo $fetch['lastname']?>" name = "lastname" required = "required">
						</div>
						<div class = "form-group">
							<label for = "ci_secretaria">Cédula: </label>
							<input class = "form-control" type = "number" name = "ci_secretaria" placeholder = "" value = "<?php echo $fetch['ci_secretaria']?>">
						</div>
							<button class = "btn btn-warning" name = "edit_user" ><span class = "glyphicon glyphicon-edit"></span> GUARDAR</button>
							<br />
					</div>	
					<?php require 'edit_query.php'?>
					</div>
				</form>			
			</div>	
		</div>	
	</div>
		<?php 
		require_once 'footer.php';	
	?>
<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>