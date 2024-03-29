<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	// $qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $ffecalysis = $qfecalysis->fetch_array();
	// $qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` `prenatal` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $fmaternity = $qmaternity->fetch_array();
	// $qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $fhematology = $qhematology->fetch_array();
	// $qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $fdental = $qdental->fetch_array();
	// $qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $fxray = $qxray->fetch_array();
	// $qrehab = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $frehab = $qrehab->fetch_array();
	// $qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $fsputum = $qsputum->fetch_array();
	// $qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date' GROUP BY `paciente_no`") or die(mysqli_error());
	// $furinalysis = $qurinalysis->fetch_array();
?>
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Historias Clinicas - Consultorio Medico Popular Pio Tamayo</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?> <script src="../js/script.js"></script>  
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
			window.onload = function() { 
				$("#chartContainer").CanvasJSChart({ 
					title: { 
						text: "Pacientes <?php echo $date?>",
						fontSize: 24
					}, 
					axisY: { 
						title: "asda" 
					}, 
					legend :{ 
						verticalAlign: "center", 
						horizontalAlign: "left" 
					}, 
					data: [ 
					{ 
						type: "pie", 
						showInLegend: true, 
						toolTipContent: "{label} <br/> {y}", 
						indexLabel: "{y}", 
						dataPoints: [ 
							{ label: "datos_historias",  y: 
								<?php
									if($frehab == ""){
										echo 0;
									}else{
										echo $frehab['total'];
									}	
								?>, legendText: "datos_historias"}
						] 
					} 
					] 
				}); 
			} 
		</script>
	 </head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
		<?php 
			$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $_SESSION[admin_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $f['firstname']." ".$f['lastname'];
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<?php 
		require_once 'sidebar.php';	
	?>
	<div id = "content">
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<center><h1 class = "title">Administra tus Historias Clínicas de manera efectiva</a></h1></center>
	</div>
	<?php 
		require_once 'footer.php';	
	?>
		
</body>
</html>