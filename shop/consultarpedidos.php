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
$resultado = $con->ejecutar("select * from pedidos order by fechaped desc");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Consulta De Pedidos</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Consulta de Pedidos</h1>
<div align="center">
<table border="1" class="tablaadm">
<tr>
<th>Numero de Pedido</th>
<th>Productos</th>
<th>Precio Total</th>
<th>Cliente</th>
<th>Fecha de Compra</th>
<th>Estado</th>
<th colspan="2">Acciones</th>
</tr>
<tr>

<?php
//paginacion
$registros = 15; //Cantidad de registros que quieres que aparezcan por cada pagina
$contador = 0; //inicio del contador
if(empty($_GET['pagina'])) {
	
    $inicio = 0;
    $pagina = 1;
} else {
	$pagina = $_GET['pagina']; //variable que recibe la siguente pagina a mostrar
    $inicio = ($pagina -1) * $registros;
}
//lista de registros
$total_lista = $resultado->num_rows;
//lista de registros con la limitacion
$resultadoordenado = $con->ejecutar("SELECT * FROM pedidos ORDER BY fechaped desc LIMIT $inicio,$registros");
$total_paginas = ceil($total_lista / $registros);
if($total_lista >=1){
while($row_pedido = $resultadoordenado->fetch_assoc()){	
if($row_pedido['estado'] == "Completado"){
			
			$estadoped = '<img src="icons/estadok.png" >';
						
		}else if($row_pedido['estado'] == "Pagado"){
			
			$estadoped = '<img src="icons/estadopag.png" >';
			
		}else if($row_pedido['estado'] == "Enviado"){
			
			$estadoped = '<img src="icons/estadoenv.png" >';
			
		}else if($row_pedido['estado'] == "Cancelado"){
			
			$estadoped = '<img src="icons/estadoko.png" >';
			
		}
echo '<td>'.$row_pedido['numped'].'</td><td>'.$row_pedido['productos'].'</td><td>'.$row_pedido['pretotal'].'€</td><td>'.$row_pedido['correo'].'</td><td>'.$row_pedido['fechaped'].'</td><td>'.$row_pedido['estado'].$estadoped.'</td><td><a href="modificarped.php?ped='.$row_pedido['numped'].'"><img src="icons/edit.png"></a></td><td><a href="eliminarpedido.php?ped='.$row_pedido['numped'].'"><img src="icons/delped.png"></a></td></tr>';
}
} else{
echo "No hay registros";
}

?>
</table>
<?php
if ($total_lista) {
            /**
             * Acá activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
             * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
             * a 0 se activara el href del link para poder retroceder.
             */
            if (($pagina - 1) > 0) {
                echo "<a class='pagadm' href='consultararticulo.php?pagina=".($pagina-1)."'><-/a>";
            } else {
                
            }
 
            // Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($pagina == $i) {
                    echo "<a class='pagadm' id='pagi_actv'>". $pagina ."</a>"; 
                } else {
                    echo "<a class='pagadm' href='consultararticulo.php?pagina=$i'>$i</a> "; 
                }   
            }
 
            /**
             * Igual que la opción primera de "< Anterior", pero acá para la opción "Siguiente >", si estamos en la ultima pagina no podremos
             * utilizar esta opción.
             */
            if (($pagina + 1)<=$total_paginas) {
                echo "<a class='pagadm' href='consultararticulo.php?pagina=".($pagina+1)."'-></a>";
            } else {
                
            }        
        }

?>
</br>
</br>
<div class="divboton">
<a class="botonadm" href="panadmin.php">Volver a al Menu principal</a>
</div>
</body>
</html>
