<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("delete from pedidos where numped = '$_GET[ped]'");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("Eliminado CON EXITO");
	location.href ="consultarpedidos.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL Eliminar");
		location.href ="consultarpedidos.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
