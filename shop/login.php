<html>
<head>
<?php

session_start();

?>
<title>Login de Acceso</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</head>
<body class="panelusu">
<div class="acceso">
<form action="auth.php" method="POST" class="accesomin">
<legend>Login de Acceso</legend>
</br>
<label>Correo:</label></br></br>
<input type="text" name="usuario" id="mail" size="16" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$" placeholder="ejemplo@email.com"/></br>
<div id="error"></div>
</br></br>
<label>Contraseña:</label></br></br>
<input type="password" name="password" size="16"/>
</br></br>
<input type="submit" value="Acceder" align="center" /></br></br>
<a class="botona" href="recupass.php"><b>¿Olvidaste tu contraseña?</b></a></br></br>
<a href="registro.php" class="botona" ><b>Registrate Aqui</b></a>
<a class="botona" href="index.php"><b>Volver a Inicio</b></a></br></br>
</form></br>

</div>
</body>
</html>