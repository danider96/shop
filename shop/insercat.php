<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
               
$resultado = $con->ejecutar("insert into categorias(categoria) values('$_POST[categoria]')");

if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("INSERTADO CON EXITO");
	location.href ="consultarcategoria.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL INSERTAR");
		location.href ="insertarcategoria.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
