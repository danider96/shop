<html>
<head>
<?php
require("bd.php");
$con = new BD();
session_start();
if(empty($_SESSION['user'])){
	
	header("Location:login.php");
	
}else{
$con->conectar();
$resultado = $con->ejecutar("select * from articulos where codart = '$_POST[codart]'");
?>
</head>
<body>
<?php
if($resultado->num_rows >=1){
$row_articulo = $resultado->fetch_assoc();
// unset($_SESSION['carrito']);
$producto = $row_articulo['codart'];
if(empty($_SESSION['carrito'])){
$_SESSION['carrito'] = (string)$producto.' ';
}else{
	$_SESSION['carrito'] .= (string)$producto.' ';
}
?>
<script>
alert("Articulo añadido correctamente");
location.href = "index.php";
</script>
<?php
}
}
?>
</body>
</html>





