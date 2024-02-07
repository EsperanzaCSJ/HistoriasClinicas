<?php
	require_once 'logincheck.php';
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
		thead {
			background-color: #edf3ff;
		}	
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid #ccc;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head> 
<body>
<button onclick="printContent('print')">Imprimir</button>
<button><a style = "text-decoration:none; color:#000;" href = "admin.php" class = "btn btn-info">VOLVER</a></button>
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
			<label style = "font-size:14px;"><center>LISTA DE MÉDICOS REGISTRADOS</center></label>
			<br />
			<br />
		<div id = "content">
			<div class = "panel-body">
				<br />
				<br />
				<table id = "table" class = "display" width = "100%" cellspacing = "0">						<thead>
					<tr>
						<th>Usuario</th>
						<th>Nombres</th>
					</tr>
				</thead>
			<tbody>
			<?php
						$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
						$query = $conn->query("SELECT * FROM `admin` ORDER BY `admin_id` DESC") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>
						<tr>
							<td><?php echo $fetch['username']?></td>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							
						</tr>
					<?php
						}
						$conn->close();
					?>
				
				</tbody>
				</table>
			</div>
		</div>
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