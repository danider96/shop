<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();

$nombre = $_FILES['imagen']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['imagen']['tmp_name'];
$ruta = "img/" . $_FILES['imagen']['name'];
$destino = "img/".$nombrer;
$resultado = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
if($_POST['oferta'] == "null"){
	
	$resultado = $con->ejecutar("update articulos set nombre = '$_POST[nomart]', descripcion = '$_POST[descart]',existencias = '$_POST[exart]',precio = '$_POST[precio]', categoria = '$_POST[categoria]', imagen = '$destino', where codart = '$_POST[codart]'");
	
}else{
$resultado = $con->ejecutar("update articulos set nombre = '$_POST[nomart]', descripcion = '$_POST[descart]',existencias = '$_POST[exart]',precio = '$_POST[precio]', categoria = '$_POST[categoria]', imagen = '$destino', oferta = '$_POST[oferta]' where codart = '$_POST[codart]'");
}
if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("MODIFICADO CON EXITO");
	location.href ="consultararticulo.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL MODIFICAR");
		location.href ="consultararticulo.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
