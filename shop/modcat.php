<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();

$resultado = $con->ejecutar("update categorias set categoria = '$_POST[categoria]' where id = '$_POST[id]'");

if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("MODIFICADO CON EXITO");
	location.href ="consultarcategoria.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL MODIFICAR");
		location.href ="consultarcategoria.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
