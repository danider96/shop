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
$resultado = $con->ejecutar("select * from articulos");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Consultar Articulos</title>
</head>
<body class="paneladmin">
<h1 class="tituloadm">Consultar Articulos</h1>
<div align="center">
<table border="1" class="tablaadm">
<tr>
<th>Codigo de Articulo</th>
<th>Nombre del Articulo</th>
<th>Descripcion del articulo</th>
<th>Existencias</th>
<th>Precio</th>
<th>Categoria</th>
<th>Oferta</th>
<th>Imagen</th>
<th colspan="2">Acciones</th>
</tr>
<tr>

<?php
//paginacion
$registros = 14; //Cantidad de registros que quieres que aparezcan por cada pagina
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
$resultadoordenado = $con->ejecutar("SELECT * FROM articulos ORDER BY codart ASC LIMIT $inicio,$registros");
$total_paginas = ceil($total_lista / $registros);
if($total_lista >=1){
while($row_articulo = $resultadoordenado->fetch_assoc()){	
if($row_articulo['oferta'] ==1){
	
	$oferta = "En Oferta";
}else{
	
	$oferta = "No";
}
echo '<td>'.$row_articulo['codart'].'</td><td>'.$row_articulo['nombre'].'</td><td>'.substr($row_articulo['descripcion'],0,140).'...</td><td>'.$row_articulo['existencias'].'</td><td>'.$row_articulo['precio'].'€</td><td>'.$row_articulo['categoria'].'</td><td>'.$oferta.'</td><td><img src="'.$row_articulo['imagen'].'" width="50" height="50"></td><td><a href="modificart.php?codart='.$row_articulo['codart'].'"><img src="icons/edit.png"></a></td><td><a href="elimart.php?codart='.$row_articulo['codart'].'"><img src="icons/delped.png"></a></td></tr>';
   $contador++;
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
                echo "<a class='pagadm' href='consultararticulo.php?pagina=".($pagina-1)."'><-</a>";
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
                echo "<a class='pagadm' href='consultararticulo.php?pagina=".($pagina+1)."'>-></a>";
            } else {
                
            }        
        }
?>

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