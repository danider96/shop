<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require("bd.php");
$con = new BD();
session_start();
if($_SESSION['admin']){
?>
<title>Insertar Articulo</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Insertar Articulo</h1>
<div class="accesoadm">
<form action="inserart.php" method="POST" ENCTYPE="multipart/form-data">
<label>Nombre del Articulo</label></br></br>
<input type="text" name="nomart" required /></br>
<label>Descripcion del articulo</label></br></br>
<textarea name="descart" rows="10" cols="60"></textarea></br>
<label>Existencias</label></br></br>
<input type="number" name="exart" required /></br>
<label>Precio</label></br></br>
<input type="text" name="precio" required /></br>
<?php
echo '
<label>Categoria</label></br></br>
<select name="categoria" >';
$con->conectar();
$resultado = $con->ejecutar("select * from categorias");
while($row = $resultado->fetch_assoc()){
	
	echo '<option value="'.$row['categoria'].'">'.$row['categoria'].'</option>';
	
}
echo'
</select></br>';
?>
<label>Oferta</label></br>
<select name="oferta">
<option value="1">Si</option>
<option value="0" selected>No</option>
</select></br>
<label>Imagen</label></br></br>
<input type="file" name="imagen" value="" required /> </br></br>
<input type="submit" value="Insertar Articulo" /></br>
</form>
</br>
</br>
</br>
</br>
</br>
<div class="divboton">
<a class="botonadm" href="panadmin.php">Volver al Menú</a>
</div>
</div>
</body>
</html>
<?php
}else{
	header("Location:index.php");
	
}
?>