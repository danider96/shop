<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
session_start();
if($_SESSION['admin']){
?>
<title>Panel de acceso administrador</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Panel de Administracion</h1>
<div class="accesoadm">
<ol class="opciones">
<li><a href="insertararticulo.php">Insertar Articulo</a></li>
<li><a href="consultararticulo.php">Gestionar Articulos</a></li>
<li><a href="consultarpedidos.php">Gestionar Pedidos</a></li>
<li><a href="consultarreclamaciones.php">Gestionar Reclamaciones</a></li>
<li><a href="insertarcategoria.php">Insertar Categorias</a></li>
<li><a href="consultarcategoria.php">Gestionar Categorias</a></li>
<li><a href="cerrarsession.php">Cerrar Sesion</a></li>
</ol>
</div>
</body>
</html>
<?php
}else{
	
	header("Location:index.php");
	
}
?>