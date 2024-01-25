<?php	require_once 'logincheck.php';?>
<!DOCTYPE html>
<html lang = "eng">
	<?php	require_once 'head.php';?>
	<body>
		<?php	require_once 'navbar.php';?>
		<?php	require_once 'sidebar.php';?>
		<div id = "content">			
				<br />
				<br />
				<br />
				<br />
				<center><h2 class = "title">Respalda y mantén seguros tus datos</a></h2></center>
				<?php	require_once 'sidebar.php';

			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'hcpms';
			
			// Conexión a la base de datos
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			// Comprobar la conexión
			if (!$conn) {
				die("Conexión fallida: " . mysqli_connect_error());
			}
			
			// Obtener las tablas de la base de datos
			$tables = array();
			$result = mysqli_query($conn, "SHOW TABLES");
			while ($row = mysqli_fetch_row($result)) {
				$tables[] = $row[0];
			}
			
			// Crear el archivo de respaldo
			$filename = 'respaldo_hcpms_'.date('Y-m-d').'.sql';
			$file = fopen($filename, 'w');
			
			// Agregar el encabezado al archivo de respaldo
			fwrite($file, "-- Respaldando la base de datos '".$dbname."'\n");
			fwrite($file, "-- Fecha: ".date('Y-m-d H:i:s')."\n\n");

			// Recorrer las tablas y agregarlas al archivo de respaldo
			foreach ($tables as $table) {
				$result = mysqli_query($conn, "SELECT * FROM ".$table);
				$num_fields = mysqli_num_fields($result);

				fwrite($file, "--\n");
				fwrite($file, "-- Estructura de la tabla '".$table."'\n");
				fwrite($file, "--\n\n");

				// Agregar la estructura de la tabla al archivo de respaldo
				$structure = mysqli_query($conn, "SHOW CREATE TABLE ".$table);
				$row = mysqli_fetch_row($structure);
				fwrite($file, $row[1].";\n\n");

				fwrite($file, "--\n");
				fwrite($file, "-- Datos de la tabla '".$table."'\n");
				fwrite($file, "--\n\n");

				// Agregar los datos de la tabla al archivo de respaldo
				while ($row = mysqli_fetch_row($result)) {
					fwrite($file, "INSERT INTO ".$table." VALUES(");
					for ($i = 0; $i < $num_fields; $i++) {
						if (isset($row[$i])) {
							fwrite($file, "'".$row[$i]."'");
						} else {
							fwrite($file, "NULL");
						}
						if ($i < ($num_fields - 1)) {
							fwrite($file, ",");
						}
					}
					fwrite($file, ");\n");
				}
				fwrite($file, "\n");
			}
			include_once 'audit.php';
			audit($_SESSION['admin_id'], "Ha realizado un respaldo de la Base de Datos", "admin");
			// Cerrar el archivo de respaldo y la conexión a la base de datos
			fclose($file);
			mysqli_close($conn);


			$dir = '.';
			$files = scandir($dir);

			echo "<div style='padding: 50px;'><table style='width: 100%; border-collapse: collapse; border-radius: 50px;'></div>";
			echo "<tr style='background-color: #d8e8f0; color: #3c5876;'>
					<th style='text-align: center; padding: 10px;'>Nombre del archivo</th>
					<th style='text-align: center; padding: 10px;'>Tamaño del archivo</th>
					<th style='text-align: center; padding: 10px;'>Fecha de modificación</th>
					<th style='text-align: center; padding: 10px;'></th>
				  </tr>";
			foreach ($files as $file) {
			if (pathinfo($file, PATHINFO_EXTENSION) == 'sql') {
				$size = filesize($dir.'/'.$file);
				$date = date('Y-m-d H:i:s', filemtime($dir.'/'.$file));
				echo "<tr style='background-color: #f1f1f1;'>
						<td style='text-align: center; padding: 10px;'>".$file."</td>
						<td style='text-align: center; padding: 10px;'>".$size."</td>
						<td style='text-align: center; padding: 10px;'>".$date."</td>
						<td><a style='background-color: #4CAF50; color: white; text-align: center; padding: 10px; color: white;  border-radius: 10px;' href='".$dir."/".$file."' download>Descargar</a></td>
					  </tr>";
			}
			}
			echo "</table>";
		?>
				<br />
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