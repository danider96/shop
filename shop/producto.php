<html>
<head>
<?php
require('bd.php');
$con = new BD();
$con->conectar();
session_start();
if(!empty($_SESSION['admin'])){
	
	header("LOCATION:panadmin.php");
	
}
include("includes/header.php");
?>
<title>Tienda Dersys</title>
<div class="sidebar-left" style="visibility:hidden;">
</br>
</div>
<div class="contenedor">
<?php
$resultado = $con->ejecutar("select * from articulos where codart = '$_GET[id]'");
	if($resultado->num_rows >=1){
		$fila = $resultado->fetch_assoc();
		if($fila['existencias'] > 0){
			
			$comprarex = '<input id="anadir" class="boton" type="submit" value="Añadir al Carrito" />';
			$indiex = '<img src="icons/ok.png" width="15px" height="15px">';
			
		}else{
			$comprarex = '<div class="botondespro">Añadir al Carrito</div>';
			$indiex = '<img src="icons/ko.png" width="15px" height="15px">';
			
		}
		echo '<h1>'.$fila['nombre'].'</h1></br>
			<div class="imagenprod" ><img src="'.$fila['imagen'].'"></div></br><hr class="separador"><p class="descprod">'.$fila['descripcion'].'</p></br><hr class="separador"><h2>'.$fila['precio'].'€</h2></br><b> Quedan '.$fila['existencias'].$indiex.'</b><br><form method="POST" action="anadircarrito.php" ></br>'.$comprarex.'</br><input type="hidden" name="codart" value="'.$fila['codart'].'" /></form></br></br>';
		
	}
?>
</div>
<div class="sidebar-right">
<?php
include("includes/main.php");
?>
</div>
<div class="footer">
<?php
include("includes/footer.php");
?>
</div>
<script type="text/javascript">
function mostrar(id){
var elemento = document.getElementById(id);
elemento.style.display = "inline"
}
function ocultar(id){
var elemento = document.getElementById(id);
elemento.style.display = "none"
}
</script>
</body>
</html>