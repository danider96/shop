<html>
<head>
<?php

session_start();
if(!empty($_SESSION['admin'])){
	
	header("LOCATION:panadmin.php");
	
}
if(empty($_SESSION['user'])){
	
	header("Location:login.php");
	
}
include("includes/header.php");
?>
<title>Tienda Dersys-Mi Carrito</title>

<div class="sidebar-left" style="visibility:hidden;">
</br>
</div>
<div class="contenedor">
<h1>Productos en el Carrito:</h1>
<hr class="separador">

<?php

require('bd.php');
$con = new BD();
if(empty($_SESSION['carrito'])){
	
	echo '<h1>No Tienes Productos en tu carrito</h1>';
	
}else{
	?>
	
<div class="carrito">
	<table class="tabla-carr"><tr><th>Cantidad</th><th>Producto</th><th>Precio</th><th></th></tr>
	<?php
$con->conectar();
$j = 1;
$pretotal=0;
for($i = 0;$i < count($productos); $i++){
	foreach(contarValoresArray($productos) as $clave => $valor){
		if($productos[$i] == $clave){
						
			$cantidad = $valor;
			$codigo = $clave;			
		}
				
	}
	$resultado = $con->ejecutar("select * from articulos where codart ='$codigo'");
		if($resultado->num_rows ==1){
			while($fila = $resultado->fetch_assoc()){
				$filtrado[] = "";
				if(in_array($fila['nombre'],$filtrado)){
					
				}else{
					$filtrado[] .= $fila['nombre'];
					echo '<tr><td id="cantidad"><a href="menosart.php?prod='.$fila['codart'].'" ><img src="icons/menos.png" style="margin-right:5%;"></a>'.$cantidad.'<a href="masart.php?prod='.$fila['codart'].'&cant='.$cantidad.'"><img src="icons/mas.png"></a></td><td>'.$fila['nombre'].'</td><td>'.$fila['precio']*$cantidad.'€</td><td><a href="eliminarcar.php?prod='.$fila['codart'].'"><img src="icons/aspa.png" alt="Eliminar"></a></td></tr>';
					$pretotal += $fila['precio']*$cantidad;
					$cantidad = 0;
				}
			}
			
		}
}
echo '<tr><th colspan="2">Total</th><td colspan="2">'.$pretotal.'€</td></tr>';
}
?>
</table>
</br>
<a class="boton" href="fincompra.php" style="margin-right:10%;">Finalizar Compra</a>
</br></br>

<hr class="separador">
</div>
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