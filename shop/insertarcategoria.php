<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
require("bd.php");
$con = new BD();
session_start();
if($_SESSION['admin']){
?>
<title>Insertar Categoria</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Insertar Categoria</h1>
<div class="accesoadm">
<form action="insercat.php" method="POST" ENCTYPE="multipart/form-data">
<label>Categoria</label></br></br>
<input type="text" name="categoria" required /></br>
</br>
</br>
<input type="submit" value="Insertar Categoria" /></br>
</form>
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