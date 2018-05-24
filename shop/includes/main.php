<?php
if(!empty($_SESSION['user'])){
	echo '
	<h2>Bienvenido '.$_SESSION['user'].'</h2></br>
	<a class="botona" href="cerrarsession.php">Cerrar Sesion</a>
	';
	?>
	<script>
	document.getElementById("acceder").href = "#";
	document.getElementById("micuenta").href = "micuenta.php";
	</script>
	
	<?php
}else{
	echo '
<form action="auth.php" method="POST" id="myform" class="accesomin">
<legend>Login de Acceso</legend>
</br>
<label>Correo:</label></br></br>
<input type="text" name="usuario" id="mail" size="16" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$" placeholder="ejemplo@email.com"/>
<div id="error"></div>
</br></br>
<label>Contraseña:</label></br></br>
<input type="password" name="password" size="16"/>
</br></br>
<input type="submit" value="Acceder" align="center" />
</form></br>
<a class="botona" href="recupass.php"><b>¿Olvidaste tu contraseña?</b></a></br></br>
<a href="registro.php" class="botona" ><b>Registrate Aqui</b></a></br>
</br>
';
}
?>