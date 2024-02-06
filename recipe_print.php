<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	@media print {  
		@page {
			size:letter;
		}
}
		#print{
			width:850px;
			height:1100px;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `datos_historias` NATURAL JOIN `paciente` WHERE `paciente_no` = '$_GET[paciente_no]' && `atencion_no` = '$_GET[atencion_no]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>
<button onclick="printContent('print')">Imprimir</button>
<button><a style = "text-decoration:none; color:#000;" href = "datos_historias_form.php?paciente_no=<?php echo $f['paciente_no']?>&atencion_no=<?php echo $_GET['atencion_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">VOLVER</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "images/logo.png" height = "80px" width = "80px" style = "float:left; position:relative; left:15%;" />
			<div style = "float:right; position:relative; right:35%;">
				<br />
				<label><center>Consultorio Médico Popular Pio Tamayo</center></label>
				<label><center>Comunidad Pio Tamayo</center></label>
				<label><center>Barquisimeto, Estado Lara, Venezuela</center></label>
			</div>
			<br style = "clear:both;" />
			<br />
			<br />
			<br />
			<label><center><b>CONSULTORIO MÉDICO POPULAR PIO TAMAYO</b></center></label>
			<label style = "font-size:14px;"><center>Fecha: <?php echo $f['date']?></center></label>
			<label><b>DATOS DEL PACIENTE:</b></label>
			<br />
			<label>Nombres: <?php echo $f['firstname']." ".$f['lastname']?></label>
			<br />
			<label>Edad: <?php echo $f['age']?></label>
			<br />
			<br />			
			<!-- <//?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `user` NATURAL JOIN `user_id` WHERE `user_id`") or die(mysqli_error());
			$fe = $q->fetch_array();
			?>			 -->
			<label><b>DATOS DEL MÉDICO:</b></label>
			<br />
			<label>Nombres: <?php echo $fetch['firstname']." ".$fetch['lastname']?>
			<br />
			<label>Especialidad: <?php echo $fetch['especialidad']?></label></label>
			<br />
			<label>Cédula: <?php echo $fetch['cimedico']?></label></label>
			<br />
			<br />
			<label><center><u><b>RECIPE MÉDICO</b></u></center></label>
			<br />
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['plan']?></label>
		</div>
	</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>