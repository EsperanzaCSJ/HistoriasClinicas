<div class = "navbar navbar-default navbar-fixed-top">
	<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Historias Clinicas - Consultorio Medico Popular Pio Tamayo</label>
	<ul class = "nav navbar-right">	
			<li class = "dropdown">
				<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
					<span class = "glyphicon glyphicon-user"></span>
					<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
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