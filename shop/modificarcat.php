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
$resultado = $con->ejecutar("select * from categorias where id = '$_GET[id]'");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Modificar Categoria</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Modificar Categoria</h1>
<div class="accesoadm">
<form action="modcat.php" method="POST" enctype=
"multipart/form-data"></br>
<label>ID</label></br></br>
<input type="number" name="id" value="<?php echo $_GET['id'];?>" readonly />
<?php
while($row_cat = $resultado->fetch_assoc()){	
echo '</br>
<label>Categoria</label></br></br>
<input type="text" name="categoria" value="'.$row_cat['categoria'].'" /></br></br>';
}
?>
<input type="submit" value="Modificar Categoria" /></br>

</form>
</br></br></br>
<div class="divboton">
<a class="botonadm"href="consultarcategoria.php">Volver a Seleccionar Categoria</a>
</div>
</div>
</br>

</body>
</html>





