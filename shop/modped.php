<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("update pedidos set productos = '$_POST[prod]', pretotal = '$_POST[pretotal]',correo = '$_POST[correo]',fechaped = '$_POST[fechaped]', estado = '$_POST[estado]' where numped = '$_POST[numped]'");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("MODIFICADO CON EXITO");
	location.href ="consultarpedidos.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL MODIFICAR");
		location.href ="consultarpedidos.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
