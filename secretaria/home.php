<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang = "eng">
<?php
	require_once 'head.php';
?>
<body>
<?php
	require_once 'navbar2.php';
?>
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