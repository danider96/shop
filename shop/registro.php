<html>
<head>
<?php

session_start();

?>
<title>Registro de Nuevo Usuario</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
var valmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
setInterval(function(){

	if($('#mail').val().length == 0 || valmail.test($('#mail').val())){
	
		$('#error').addClass("hide");
		$('#error').html("");
		$('#mail').css("border","green");
		$("#resultado").removeClass("hide");
		var consulta;
                                                 
      //comprobamos si se pulsa una tecla
      $("#mail").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#mail").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(3000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="img/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "ajax.php",
                              data: "mail="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	}else if(!valmail.test($('#mail').val())){
	
		$('#error').removeClass("hide");
		$('#error').html("Debe Ser un Correo Electronico");
		$('#error').css("color", "orange");
		$('#mail').css("border","red");
		$("#resultado").addClass("hide");
	}
	if($('#pass').val().length == 0){
	
		$('#errorpass').addClass("hide");
	}else{
		if($('#pass').val().length <= 6){
	
		$('#errorpass').removeClass("hide");
		$('#errorpass').html("Contraseña DEBIL");
		$('#errorpass').css("color", "yellow");
	
		}else if($('#pass').val().length <= 10){
	
		$('#errorpass').removeClass("hide");
		$('#errorpass').html("Contraseña NORMAL");
		$('#errorpass').css("color", "orange");
	
		}else if($('#pass').val().length > 11){
	
		$('#errorpass').removeClass("hide");
		$('#errorpass').html("Contraseña ROBUSTA");
		$('#errorpass').css("color", "green");
	
		}
	}
	


}, 1000);

      
</script>
</head>
<body class="panelusu">
<div class="registro">
<form action="reg.php" method="POST" class="accesomin" autocomplete="off" >
<legend>Registro Nuevo Usuario</legend>
</br>
<label>Correo:</label></br></br>
<input type="text" name="usuario" id="mail" size="16" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$" placeholder="ejemplo@email.com"/>
<div id="error"></div>
<div id="resultado"></div>
</br></br>
<label>Contraseña:</label></br></br>
<input type="password" name="password" id="pass" size="16"/>
<div id="errorpass"></div>
</br></br>
<label>Nombre:</label></br></br>
<input type="text" name="nombre" size="16"/>
</br></br>
<label>Apellidos:</label></br></br>
<input type="text" name="apellidos" size="16"/>
</br></br>
<label>Codigo Postal:</label></br></br>
<input type="number" name="postal" size="16" maxlength="5" pattern="[0-9]{5}"/>
</br></br>
<label>Direccion:</label></br></br>
<input type="text" name="direccion" size="16"/>
</br></br>
<input type="submit" value="Registrarse" align="center" /></br></br>
<a href="login.php" class="botona" ><b>Acceder a mi cuenta</b></a>
<a class="botona" href="index.php"><b>Volver a Inicio</b></a></br></br>
</form></br>
</div>
</body>
</html>