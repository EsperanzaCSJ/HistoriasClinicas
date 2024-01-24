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
			$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `rehab_id` = '$_GET[rehab_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Imprimir</button>
<button><a style = "text-decoration:none; color:#000;" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $_GET['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">VOLVER</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "../images/logo.png" height = "80px" width = "80px" style = "float:left; position:relative; left:15%;" />
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
			<label style = "font-size:14px;"><center>Historia Clinica de visita del día: <?php echo $f['fecha']?></center></label>
			<label><b>DATOS DEL PACIENTE:</b></label>
			<br />
			<label>Nombres: <?php echo $f['firstname']." ".$f['lastname']?>
			<label style = "margin-right:48%; float:right;">Motivo de la consulta: <?php echo $f['diagnosis']?></label></label>
			<br />
			<label>Edad: <?php echo $f['age']?></label>
			<br />
			<label>Genero: <?php echo $f['gender']?></label>
			<br/>
			<label>Dirección: <?php echo $f['address']?></label>
			<br />
			<label>Fecha de nacimiento: <?php echo $f['birthdate']?></label>
			<br />
			<br />
			<label>Temperatura: <u><?php 
			$t = substr($f['temp'], 0, 2);
			echo $t; ?></u>&deg;C</label>
			<label>Tensión: <u>&nbsp;<?php echo $f['pr']?>&nbsp;</u></label>
			<label>Altura: <u>&nbsp;<?php echo $f['ht']?>&nbsp;</u></label>
			<label>Peso: <u>&nbsp;<?php echo $f['wt']?>&nbsp;</u></label>
			<br />
			<br />
			<br />
			<label><center><u><b>EVALUACIÓN DEL PACIENTE</b></u></center></label>
			<br />
			<br />
			<label><b>Motivo de la consulta:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['subjective']?></label>
			<br />
			<br />
			<label><b>Diagnostico:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['diagnostico']?></label>
			<br />
			<br />
			<label><b>Evaluación:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['objective']?></label>
			<br />
			<br />
			<label><b>Reporte Médico:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['assessment']?></label>
			<br />
			<br />
			<label><b>Recipe:</b></label>
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