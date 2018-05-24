<?php
require('bd.php');
SESSION_START();
require("functions/comunes.php");
$productos = explode(" ",$_SESSION['carrito']);
foreach(contarValoresArray($productos) as $clave => $valor){
	if($_GET['prod'] == $clave){
		for($i = 0; $i <=$valor;$i++){
		$cantidad = $valor;
		$pos = array_search($_GET['prod'], $productos);
		unset($productos[$pos]);
		}
	}	
}
$resultado = implode(" ", $productos);
$_SESSION['carrito'] = $resultado;
?>
<script type="text/javascript">
	location.href ="carrito.php";
</script>

