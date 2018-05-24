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
$resultado = $con->ejecutar("select * from pedidos where numped = '$_GET[ped]'");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Modificar Pedido</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Modificar Pedido</h1>
<div class="accesoadm">
<form action="modped.php" method="POST"></br>
<label>Numero de Pedido</label></br></br>
<input type="number" name="numped" value="<?php echo $_GET['ped'];?>" readonly />
<?php
while($row_pedido = $resultado->fetch_assoc()){	
echo '</br>
<label>Productos</label></br></br>
<input type="text" name="prod" value="'.$row_pedido['productos'].'"  readonly /></br>
<label>Precio Total</label></br></br>
<input type="text" name="pretotal" value="'.$row_pedido['pretotal'].'" required  readonly /></br>
<label>Correo</label></br></br>
<input type="text" name="correo" value="'.$row_pedido['correo'].'" required  readonly /></br>
<label>Estado</label></br></br>
<select name="estado">
<option value="'.$row_pedido['estado'].'" selected>'.$row_pedido['estado'].'</option>';
$estados = $con->ejecutar("select distinct estado from pedidos where estado NOT LIKE '%$row_pedido[estado]%'");
while($tiposestados = $estados->fetch_assoc()){
	echo '<option value="'.$tiposestados['estado'].'">'.$tiposestados['estado'].'</option>';
}
echo '</select></br></br><label>Fecha de compra</label></br></br>
<input type="date" name="fechaped" value="'.$row_pedido['fechaped'].'"  readonly/></br></br>
';
}
?>
<input type="submit" value="Modificar Pedido" /></br>

</form>
</br>
</br>
</br>
<div class="divboton">
<a class="botonadm" href="consultarpedidos.php">Volver a Visualizar Pedidos</a>
</div>
</div>
</br>

</body>
</html>





