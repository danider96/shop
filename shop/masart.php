<?php
require('bd.php');
SESSION_START();
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("select * from articulos where codart = '$_GET[prod]'");

while($row_articulo = $resultado->fetch_assoc()){	
	if($row_articulo['existencias'] > $_GET['cant']){
	$_SESSION['carrito'] .= $_GET['prod'].' ';
	}else{
		?>
		<script type="text/javascript">
			alert("NO QUEDAN MAS PRODUCTOS EN STOCK");
			location.href ="carrito.php";
		</script>
		<?php
		
	}

}
?>
<script type="text/javascript">
	location.href ="carrito.php";
</script>

