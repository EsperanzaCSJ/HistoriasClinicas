<?php
	require_once 'logincheck.php';
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