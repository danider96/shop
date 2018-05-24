<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("select * from usuarios where correo = '$_POST[usuario]' and perm = 3 and '$_POST[password]' = pass");
if($resultado->num_rows >=1){
	$fila = $resultado->fetch_assoc();
	
	$_SESSION["admin"] = $fila['nombre'];
	header("Location:panadmin.php");
	
}else if($resultado->num_rows ==0){
	
	$resultado = $con->ejecutar("select * from usuarios where correo = '$_POST[usuario]' and perm = 1 and '$_POST[password]' = pass");
	if($resultado->num_rows >=1){
		$fila = $resultado->fetch_assoc();
		
		$_SESSION["user"] = $fila['nombre'];
		$_SESSION["coduser"] = $fila['correo'];
		header("Location:index.php");
	}else{
	
	echo '<head><title>Error de Acceso</title></head>
	<body class="panelusu">
	<div class="acceso" style="text-align:center;padding-top:15px;"></br></br><h2>USUARIO INCORRECTO O CONTRASEÑA INCORRECTA</h2></br>';
	echo '<a class="botona" href="login.php" >Volver a Logearte</a></div></body>';
	}
	
}

$con->desconectar();

?>