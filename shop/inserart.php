<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$preciocor = str_replace(",",".",$_POST['precio']);
$nombre = $_FILES['imagen']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['imagen']['tmp_name'];
$ruta = "img/" . $_FILES['imagen']['name'];
$destino = "img/".$nombrer;
$resultado = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);


                
$resultado = $con->ejecutar("insert into articulos(nombre, descripcion, existencias, precio, categoria,oferta, imagen) values('$_POST[nomart]','$_POST[descart]','$_POST[exart]','$preciocor','$_POST[categoria]','$_POST[oferta]','$destino')");

if($filas = $con->check() >= 1){
?><script type="text/javascript">
	window.alert("INSERTADO CON EXITO");
	location.href ="panadmin.php";
	</script>
	<?php
}else{
	?><script type="text/javascript">
	window.alert("ERROR AL INSERTAR");
		location.href ="insertararticulo.php";
	</script>
	<?php
}

$con->desconectar();
	
?>
