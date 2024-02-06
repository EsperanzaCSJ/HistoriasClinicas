<?php
	require_once 'logincheck.php';
	$year = date("Y", strtotime("+8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$qjan = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
	$fjan = $qjan->fetch_array();
	$qfeb = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
	$ffeb = $qfeb->fetch_array();
	$qmar = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
	$fmar = $qmar->fetch_array();
	$qapr = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
	$fapr = $qapr->fetch_array();
	$qmay = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'May' && `year` = '$year'") or die(mysqli_error());
	$fmay = $qmay->fetch_array();
	$qjun = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
	$fjun = $qjun->fetch_array();
	$qjul = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
	$fjul = $qjul->fetch_array();
	$qaug = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
	$faug = $qaug->fetch_array();
	$qsep = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Sept' && `year` = '$year'") or die(mysqli_error());
	$fsep = $qsep->fetch_array();
	$qoct = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
	$foct = $qoct->fetch_array();
	$qnov = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
	$fnov = $qnov->fetch_array();
	$qdec = $conn->query("SELECT COUNT(*) as total FROM `datos_historias` WHERE `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
	$fdec = $qdec->fetch_array();
	$year = date("Y");
?>
<!DOCTYPE html>
<html lang = "es_ES">
	<head>
		<title>Historias Clinicas - Consultorio Medico Popular Pio Tamayo</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
		<!-- jQuery & JS files -->	<?php include_once("../tpl/common_js_ventas.php"); ?>
		<script src="../js/script.js"></script>
		<?php require 'script.php'?>
		<script src = "../js/jquery.canvasjs.min.js"></script>
		<script type="text/javascript"> 
		window.onload = function(){ 
			$(".chartContainer").CanvasJSChart({ 
				title: { 
					text: "Población mensual de pacientes de rehabilitación del año <?php echo $year?>" 
				}, 
				axisY: { 
					title: "Total de Poblacion", 
					includeZero: false 
				}, 
				data: [ 
				{ 
					type: "column", 
					toolTipContent: "{label}: {y}", 
					dataPoints: [ 
						{ label: "January", y: <?php echo $fjan['total']?> },
						{ label: "Febuary", y: <?php echo $ffeb['total']?> },
						{ label: "March", y: <?php echo $fmar['total']?> },
						{ label: "April", y: <?php echo $fapr['total']?> },
						{ label: "May", y: <?php echo $fmay['total']?> },
						{ label: "June", y: <?php echo $fjun['total']?> },
						{ label: "July", y: <?php echo $fjul['total']?> },
						{ label: "August", y: <?php echo $faug['total']?> },
						{ label: "September", y: <?php echo $fsep['total']?> },
						{ label: "October", y: <?php echo $foct['total']?> },
						{ label: "November", y: <?php echo $fnov['total']?> },
						{ label: "December", y: <?php echo $fdec['total']?> }
					] 
				} 
				] 
			}); 
		}
		</script>
  </head>
<body>
<?php
	require_once 'navbar.php';
?>
	<?php
	require_once 'sidebar.php';
?>
	<div id = "content">
		<br />
		<br />
		<br />
		<div id = "ta" class = "well">
			<div class="chartContainer" style="height: 300px; width: 100%"></div>	
		</div>
		<button id = "s_target" class = "btn btn-success"><span class = "glyphicon glyphicon-eye-open"></span> Ver record</button>
		<button id = "h_target" style = "display:none;" class = "btn btn-danger"><span class = "glyphicon glyphicon-eye-close"></span> Hide Record</button>
		<br />
		<br />
		<div id = "target">
			<div class = "alert alert-info">datos_historias Record</div>
			<table id = "table" cellspacing = "0" class = "display">
				<thead>
					<tr>
						<th>Nro Documento de Identidad </th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Gender</th>
						<th>Dirección</th>
						<th><center>Accion</center></th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
					$query = $conn->query("SELECT * FROM `datos_historias` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `rehab_id` DESC") or die(mysqli_error());
					while($fetch = $query->fetch_array()){
				?>
					<tr>
						<td><?php echo $fetch['itr_no']?></td>
						<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
						<td><?php echo $fetch['age']?></td>
						<td><?php echo $fetch['gender']?></td>
						<td><?php echo $fetch['address']?></td>
						<td><center><a class = "btn btn-primary" href = "datos_historias_record.php?itr_no=<?php echo $fetch['itr_no']?>"><span class = "glyphicon glyphicon-search"></span> Todos los Registros</a></center></td>
					</tr>
				<?php
					}
				?>		
				</tbody>
			</table>
		</div>	
	</div>
		<?php 
		require_once 'footer.php';	
	?>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#target").hide();
			$("#s_target").click(function(){
				$("#target").fadeIn();
				$("#s_target").hide();
				$("#ta").slideUp();
				$("#h_target").show();
			});
			$("#h_target").click(function(){
				$("#target").fadeOut();
				$("#s_target").show();
				$("#h_target").hide();
				$("#ta").slideDown();
			});
		});
	</script>	
</body> 
</html>