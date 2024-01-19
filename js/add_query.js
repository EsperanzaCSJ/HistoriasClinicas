$(document).ready(function(){
	$("#save_admin").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		$.ajax({
			type: "POST",
			url: "add_admin.php",
			data: {
				Usuario: username,
				Contraseña: password,
				Nombre: firstname,
				Apellidos: lastname
			},
			success: function(msg){
				$("#a").html(msg);
				$("#a").fadeIn();
				$("#a").fadeOut(2000);
				$("#form_admin input").val("");
				setTimeout(function(){
					$("#add").slideUp(2000);
					window.location = "home.php";
				}, 1000);
			},
			error: function(){
				alert("error");
			}
		});
	});
});