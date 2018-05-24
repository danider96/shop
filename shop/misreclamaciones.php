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
<h1>Historial de Reclamaciones:</h1>
<hr class="separador">
<?php
require('bd.php');
$con = new BD();
$con->conectar();
$resultado = $con->ejecutar("select * from reclamaciones where correo ='$_SESSION[coduser]'");
//paginacion
$registros = 4; //Cantidad de registros que quieres que aparezcan por cada pagina
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
$resultadoordenado = $con->ejecutar("SELECT * FROM reclamaciones where correo ='$_SESSION[coduser]' ORDER BY fecharec desc LIMIT $inicio,$registros");
$total_paginas = ceil($total_lista / $registros);
if($total_lista >=1){
while($fila = $resultadoordenado->fetch_assoc()){
				
		echo '<div align="center"></br><table class="tabla-carr"><tr><th>Numero De Ticket</th><th>Descripcion</th><th>Numero de pedido</th><th>Fecha Reclamacion</th><th>Estado</th></tr><tr><td>'.$fila['id'].'</td><td>'.$fila['titulo'].'</td><td>'.$fila['numped'].'</td><td>'.$fila['fecharec'].'</td><td>'.$fila['estado'].'</td></tr></table></br></div>';
	
	}
} else{
echo "No hay Reclamaciones";
}

?>
</br>
<?php
if ($total_lista) {
            /**
             * Acá activamos o desactivamos la opción "< Anterior", si estamos en la pagina 1 nos dará como resultado 0 por ende NO
             * activaremos el primer if y pasaremos al else en donde se desactiva la opción anterior. Pero si el resultado es mayor
             * a 0 se activara el href del link para poder retroceder.
             */
            if (($pagina - 1) > 0) {
                echo "<a class='paguser' href='mispedidos.php?pagina=".($pagina-1)."'><-</a>";
            } else {
                
            }
 
            // Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($pagina == $i) {
                    echo "<a class='paguser' id='pagi_actv'>". $pagina ."</a>"; 
                } else {
                    echo "<a class='paguser' href='mispedidos.php?pagina=$i'>$i</a> "; 
                }   
            }
 
            /**
             * Igual que la opción primera de "< Anterior", pero acá para la opción "Siguiente >", si estamos en la ultima pagina no podremos
             * utilizar esta opción.
             */
            if (($pagina + 1)<=$total_paginas) {
                echo "<a class='paguser' href='mispedidos.php?pagina=".($pagina+1)."'>-></a>";
            } else {
                
            }        
        }
?>
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