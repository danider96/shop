<?php
require('bd.php');
SESSION_START();

$filtrored = explode(" ",$_SESSION['carrito']);
// natsort($filtrored);
$pos = array_search($_GET['prod'], $filtrored);
unset($filtrored[$pos]);
// $valor = substr_replace($_SESSION['carrito'],'',$busc,$busc2);
$valor = implode(" ", $filtrored);
$_SESSION['carrito'] = $valor;

?>
<script type="text/javascript">
	location.href ="carrito.php";
</script>

