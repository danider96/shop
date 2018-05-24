<html>
<head>
<title>Recuperacion de Contraseña</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
var valmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
setInterval(function(){

	if($('#mail').val().length == 0 || valmail.test($('#mail').val())){
	
		$('#error').addClass("hide");
		$('#error').html("");
		$('#mail').css("border","green");
		
	}else if(!valmail.test($('#mail').val())){
	
		$('#error').removeClass("hide");
		$('#error').html("Debe Ser un Correo Electronico");
		$('#error').css("color", "orange");
		$('#mail').css("border","red");
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

}, 100);
</script>
</head>
<?php

session_start();
$key = rand(0,100000);
$_SESSION['key'] = $key;
if(!empty($_GET['correo']) and !empty($_SESSION['key'])){
	?>
<body class="panelusu">
<div class="acceso">
<form action="recpas.php" method="POST" class="accesomin">
<legend>Cambio de contraseña</legend>
</br>
<label>Indique su Nueva Contraseña:</label></br></br>
<input type="password" name="newpass" id="pass" size="16"/>
<div id="errorpass"></div>
</br></br>
<input type="hidden" name="usuario" value="<?php echo $_GET['correo'];?>"/>
<input type="submit" value="Cambiar Contraseña" align="center" />
</form></br>
</div>
<div class="footer">
<p>Copyright Dersys® 2017 | Designed By DER</p>
</div>
	
	<?php
	// unset($_SESSION['key']);
}else{
	
	$_SESSION['key'] = $key;


echo '<body class="panelusu">
<div class="acceso">
<form action="recpas.php" method="POST" class="accesomin">
<legend>Recuperacion de contraseña</legend>
</br>
<label>Indique su Correo:</label></br></br>
<input type="text" name="usuario" id="mail" size="16"/>
<div id="error"></div>
</br></br>
<input type="hidden" name="key" value="'.$key.'"/>
<input type="submit" value="Recuperar Contraseña" align="center" /></br></br>
<a href="login.php" class="botona" ><b>Acceder a mi cuenta</b></a>
<a class="botona" href="index.php"><b>Volver a Inicio</b></a></br></br>
</form></br>
</div>
<div class="footer">
<p>Copyright Dersys® 2017 | Designed By DER</p>
</div>';
}
?>
</body>
</html>