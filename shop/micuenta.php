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
<title>Tienda Dersys-Mi cuenta</title>
<div class="sidebar-left">
<ul>
<h2>Opciones</h2></br>
<li><a class="botona" href="mispedidos.php">Historial de pedidos</a></li></br>
<li><a class="botona" href="misreclamaciones.php">Reclamaciones Realizadas</a></li>
</ul>
</div>
<div class="contenedor">
<h1>Datos de tu cuenta:</h1>
<hr class="separador">

<?php
require('bd.php');
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("select * from usuarios where correo ='$_SESSION[coduser]'");
if($resultado->num_rows ==1){
	while($fila = $resultado->fetch_assoc()){
	
		echo '<div><form action="editardatos.php" method="POST"><h2>Nombre</h2><input type="text" name="nombre" value="'.$fila['nombre'].'"/></br><h2>Apellidos</h2><input type="text" name="apellidos" value="'.$fila['apell'].'" /></br><h1>Direccion</h1><hr></br><h2>Codigo Postal</h2><input type="text" name="codpos" value="'.$fila['codpos'].'" /></br><h2>Direccion</h2><input type="texto" name="direccion" value="'.$fila['dire'].'"/></br></br><input id="editar" class="boton" type="submit" value="Editar Mis Datos" /><input type="hidden" name="correo" value="'.$fila['correo'].'" /></form></div>';
		
	}
}
?>
<hr class="separador">
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