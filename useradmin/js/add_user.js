$(document).ready(function(){
	$("#save_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();		
		var section = $("#section").val();
		var especialidad = $("#especialidad").val();
		var idmedico = $("#idmedico").val();
		var cimedico = $("#cimedico").val();
		$.ajax({
			type: "POST",
			url: "add_user.php",
			data: {
				Usuario: username,
				Contraseña: password,
				Nombre: firstname,
				Apellidos: lastname,
				Seccion: section,
				Especialidad: especialidad,
				Licencia: idmedico,				
				Cedula: cimedico
			},
			success: function(msg){
				$("#a").html(msg);
				$("#a").fadeIn();
				$("#a").fadeOut(2000);
				$("#form_user input").val("");
				setTimeout(function(){
					$("#add").slideUp(2000);
					window.location = "user.php";
				}, 1000);
			},
			error: function(){
				aler("Error!");
			}
		});
	});
});