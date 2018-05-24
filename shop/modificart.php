<html>
<head>
<?php
require("bd.php");
$con = new BD();
session_start();
if(!$_SESSION['admin']){
	
	header("Location:login.php");
	
}
$con->conectar();
$resultado = $con->ejecutar("select * from articulos where codart = '$_GET[codart]'");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Modificar Articulo</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Modificar Articulo</h1>
<div class="accesoadm">
<form action="modart.php" method="POST" enctype=
"multipart/form-data"></br>
<label>Codigo de Articulo</label></br></br>
<input type="number" name="codart" value="<?php echo $_GET['codart'];?>" readonly />
<?php
while($row_articulo = $resultado->fetch_assoc()){	
echo '</br>
<label>Nombre del Articulo</label></br></br>
<input type="text" name="nomart" value="'.$row_articulo['nombre'].'" /></br>
<label>Descripcion del articulo</label></br></br>
<textarea name="descart" row="10" cols="60">'.$row_articulo['descripcion'].'</textarea></br>
<label>Existencias</label></br></br>
<input type="number" name="exart" value="'.$row_articulo['existencias'].'" required /></br>
<label>Precio</label></br></br>
<input type="text" name="precio" value="'.$row_articulo['precio'].'" required /></br>
<label>Categoria</label></br></br>
<select name="categoria" >
<option value="'.$row_articulo['categoria'].'" selected>'.$row_articulo['categoria'].'</option>';
$con->conectar();
$resultado = $con->ejecutar("select * from categorias where categoria != '$row_articulo[categoria]'");
while($row = $resultado->fetch_assoc()){
	
	echo '<option value="'.$row['categoria'].'">'.$row['categoria'].'</option>';
	
}
echo'
</select></br>
<label>Oferta</label></br>
<select name="oferta">
<option value="null">Estado Actual</option>
<option value="1">Si</option>
<option value="0">No</option>
</select></br>
<label>Imagen</label></br></br>
<input type="file" name="imagen" value="'.$row_articulo['imagen'].'" required/> </br>
';
}
?>
<input type="submit" value="Modificar Articulo" /></br>

</form>
</br></br></br>
<div class="divboton">
<a class="botonadm"href="consultararticulo.php">Volver a Seleccionar articulo</a>
</div>
</div>
</br>

</body>
</html>





