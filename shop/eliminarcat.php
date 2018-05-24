<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("delete from categorias where id = '$_GET[id]'");
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("Eliminado CON EXITO");
	location.href ="consultarcategoria.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL Eliminar");
		location.href ="consultarcategoria.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
