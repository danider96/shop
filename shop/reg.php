<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("insert into usuarios values('$_POST[usuario]','$_POST[nombre]','$_POST[apellidos]','$_POST[password]','$_POST[postal]','$_POST[direccion]',1)");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("Registrado Con Exito");
	location.href ="index.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("Error Al Registrar");
		location.href ="registro.php";
	</script>
	<?php
}

$con->desconectar();

?>