<?php
require('bd.php');
SESSION_START();
if(empty($_SESSION['user'])){
	
	header("Location:login.php");
	
}
if(!empty($_SESSION['admin'])){
	
	header("LOCATION:panadmin.php");
	
}
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("update usuarios set nombre = '$_POST[nombre]', apell = '$_POST[apellidos]',codpos = '$_POST[codpos]',dire = '$_POST[direccion]' where correo = '$_POST[correo]'");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("MODIFICADO CON EXITO");
	location.href ="micuenta.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL MODIFICAR");
		location.href ="micuenta.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
