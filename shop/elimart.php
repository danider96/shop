<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("delete from articulos where codart = '$_GET[codart]'");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("Eliminado CON EXITO");
	location.href ="panadmin.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL Eliminar");
		location.href ="eliminararticulo.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
