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
			$q = $conn->query("SELECT * FROM `datos_historias` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `rehab_id` = '$_GET[rehab_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Imprimir</button>
<button><a style = "text-decoration:none; color:#000;" href = "datos_historias_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $_GET['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">VOLVER</a></button>
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
			<label style = "font-size:14px;"><center>Historia Clinica de visita del día: <?php echo $f['date']?></center></label>
			<label><b>DATOS DEL PACIENTE:</b></label>
			<br />
			<label>Nombres: <?php echo $f['firstname']." ".$f['lastname']?></label>
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
			<label>Temperatura: <u><?php echo $f['temp']?></u>&deg;C.</label>
			<br />
			<label>Tensión: <u>&nbsp;<?php echo $f['tension']?>&nbsp;</u>mm Hg.</label>
			<br />
			<label>Altura: <u>&nbsp;<?php echo $f['ht']?>&nbsp;</u>cm.</label>
			<br />
			<label>Peso: <u>&nbsp;<?php echo $f['wt']?>&nbsp;</u>Kg.</label>
			<br />
			<br />
			<br />
			<label><center><u><b>EVALUACIÓN DEL PACIENTE</b></u></center></label>
			<br />
			<br />
			<label><b>Sintomatología:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['sintomas']?></label>
			<br />
			<br />
			<label><b>Evaluación:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['evaluacion']?></label>
			<br />
			<br />
			<label><b>Diagnóstico:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['diagnostico']?></label>
			<br />
			<br />
			<label><b>Reporte Médico:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['reporte_med']?></label>
			<br />
			<br />
			<label><b>Recipe:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['plan']?></label>
			<br />
			<br />
			<label><b>Nota:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['nota']?></label>
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