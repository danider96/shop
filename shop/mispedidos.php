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
<h1>Historial de pedidos:</h1>
<hr class="separador">
<h2>Filtrar Por Fecha</h2></br><form action="mispedidos.php" method="POST"><b>Desde</b><input type="date" name="fecini"><b> -    Hasta</b><input type="date" name="fecult"><input type="submit" value="Buscar"></form></br>
<hr class="separador">
<?php
require('bd.php');
$con = new BD();
$con->conectar();
if(!empty($_POST['fecini']) and !empty($_POST['fecult'])){
$resultado = $con->ejecutar("select * from pedidos where correo ='$_SESSION[coduser]' and fechaped BETWEEN CAST('$_POST[fecini]' AS DATE) AND CAST('$_POST[fecult]' AS DATE)");
if($resultado->num_rows >= 1){
while($fila = $resultado->fetch_assoc()){
		$i = 0;
		$prodfac = explode('#',$fila['productos']);
		$separadocomas = implode('#',$prodfac);
		$finalprod = explode('#',$separadocomas);
			foreach(contarValoresArray($finalprod) as $clave => $valor){
						if($finalprod[$i] == $clave){
							$cantidad = $valor;
						}	
							
			$conprod = $con->ejecutar("select * from articulos where codart ='$clave'");
			$fipro = $conprod->fetch_assoc();
			// $nombresprod .= $cantidad.' Ud/S '.$fipro['nombre'].'------->'.$fipro['precio'].'€</br>';
			$i++;
			$arcant[] = $cantidad;
			$arnom[] = $fipro['nombre'];
			$arpre[] = $fipro['precio'];
			}
				
		echo '<div align="center"></br><table class="tabla-carr"><tr><th colspan="3">Numero De Pedido</th><th colspan="5">Fecha de Compra</th></tr><tr><td colspan="3">'.$fila['numped'].'</td><td colspan="5">'.$fila['fechaped'].'</td></tr><tr><th colspan="8">Productos</th></tr><tr><th>Cantidad</th><th colspan="6">Descripcion</th><th>Precio Unitario</th></tr>';
		for($j = 0; $j < count($arcant);$j++){
			
			echo '<tr><td>'.$arcant[$j].'</td><td colspan="6">'.$arnom[$j].'</td><td>'.$arpre[$j].'€</td></tr>';
			
			
		}
		$conrec = $con->ejecutar("select * from reclamaciones where numped ='$fila[numped]'");
		$firec = $conrec->fetch_assoc();
		echo '<tr><th colspan="3">Precio Total</th><td colspan="5"><b> '.$fila['pretotal'].'€</b></td></tr></table></br></div>';
		if($fila['estado'] == "Completado"){
			
			$estadoped = '<img src="icons/estadok.png" >';
			$reclpedido = '';
			$reclapedido = '';
						
		}else if($fila['estado'] == "Pagado"){
			
			$estadoped = '<img src="icons/estadopag.png" >';
			$reclpedido = '<th>Reclamar Pedido</th>';
			$reclapedido = '<td><a href="reclamarpedido.php?ped='.$fila['numped'].'"><img src="icons/reclamar.png"></a></td>';
			
		}else if($fila['estado'] == "Enviado"){
			
			$estadoped = '<img src="icons/estadoenv.png" >';
			$reclpedido = '<th>Reclamar Pedido</th>';
			$reclapedido = '<td><a href="reclamarpedido.php?ped='.$fila['numped'].'"><img src="icons/reclamar.png"></a></td>';
			
		}else if($fila['estado'] == "Cancelado"){
			
			$estadoped = '<img src="icons/estadoko.png" >';
			$reclpedido = '';
			$reclapedido = '';
		}
		if($conrec->num_rows >= 1){
			
			$reclpedido = '<th>Pedido Reclamado</th>';
			$reclapedido = '<td><a href="misreclamaciones.php?ped='.$fila['numped'].'"><img src="icons/proceso.png"></a></td>';
			
		}
		echo '<div align="center"></br><table class="tabla-carr"><tr><th colspan="2">Estado del Pedido</th>'.$reclpedido.'<th>Factura Compra</th></tr><tr><td colspan="2">'.$fila['estado'].$estadoped.'</td>'.$reclapedido.'<td ><a href="facpdf.php?numped='.$fila['numped'].'"><img src="icons/pdf.png" ></a></td></tr></table></br><hr ></div>';
		$nombresprod = "";
		
		unset($arcant);
		unset($arnom);
		unset($arpre);
	}
}
}else{
$resultado = $con->ejecutar("select * from pedidos where correo ='$_SESSION[coduser]'");
$nombresprod = "";
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
$resultadoordenado = $con->ejecutar("SELECT * FROM pedidos where correo ='$_SESSION[coduser]' ORDER BY fechaped desc LIMIT $inicio,$registros");
$total_paginas = ceil($total_lista / $registros);
if($total_lista >=1){
while($fila = $resultadoordenado->fetch_assoc()){
		$i = 0;
		$prodfac = explode('#',$fila['productos']);
		$separadocomas = implode('#',$prodfac);
		$finalprod = explode('#',$separadocomas);
			foreach(contarValoresArray($finalprod) as $clave => $valor){
						if($finalprod[$i] == $clave){
							$cantidad = $valor;
						}	
							
			$conprod = $con->ejecutar("select * from articulos where codart ='$clave'");
			$fipro = $conprod->fetch_assoc();
			// $nombresprod .= $cantidad.' Ud/S '.$fipro['nombre'].'------->'.$fipro['precio'].'€</br>';
			$i++;
			$arcant[] = $cantidad;
			$arnom[] = $fipro['nombre'];
			$arpre[] = $fipro['precio'];
			}
				
		echo '<div align="center"></br><table class="tabla-carr"><tr><th colspan="3">Numero De Pedido</th><th colspan="5">Fecha de Compra</th></tr><tr><td colspan="3">'.$fila['numped'].'</td><td colspan="5">'.$fila['fechaped'].'</td></tr><tr><th colspan="8">Productos</th></tr><tr><th>Cantidad</th><th colspan="6">Descripcion</th><th>Precio Unitario</th></tr>';
		for($j = 0; $j < count($arcant);$j++){
			
			echo '<tr><td>'.$arcant[$j].'</td><td colspan="6">'.$arnom[$j].'</td><td>'.$arpre[$j].'€</td></tr>';
			
			
		}
		
		echo '<tr><th colspan="3">Precio Total</th><td colspan="5"><b> '.$fila['pretotal'].'€</b></td></tr></table></br></div>';
		$conrec = $con->ejecutar("select * from reclamaciones where numped ='$fila[numped]'");
		$firec = $conrec->fetch_assoc();
		if($fila['estado'] == "Completado"){
			
			$estadoped = '<img src="icons/estadok.png" >';
			$reclpedido = '';
			$reclapedido = '';
						
		}else if($fila['estado'] == "Pagado"){
			
			$estadoped = '<img src="icons/estadopag.png" >';
			$reclpedido = '<th>Reclamar Pedido</th>';
			$reclapedido = '<td><a href="reclamarpedido.php?ped='.$fila['numped'].'"><img src="icons/reclamar.png"></a></td>';
			
		}else if($fila['estado'] == "Enviado"){
			
			$estadoped = '<img src="icons/estadoenv.png" >';
			$reclpedido = '<th>Reclamar Pedido</th>';
			$reclapedido = '<td><a href="reclamarpedido.php?ped='.$fila['numped'].'"><img src="icons/reclamar.png"></a></td>';
			
		}else if($fila['estado'] == "Cancelado"){
			
			$estadoped = '<img src="icons/estadoko.png" >';
			$reclpedido = '';
			$reclapedido = '';
		}
		if($conrec->num_rows >= 1){
			
			$reclpedido = '<th>Pedido Reclamado</th>';
			$reclapedido = '<td><a href="misreclamaciones.php?ped='.$fila['numped'].'"><img src="icons/proceso.png"></a></td>';
			
		}
		echo '<div align="center"></br><table class="tabla-carr"><tr><th colspan="2">Estado del Pedido</th>'.$reclpedido.'<th>Factura Compra</th></tr><tr><td colspan="2">'.$fila['estado'].$estadoped.'</td>'.$reclapedido.'<td ><a href="facpdf.php?numped='.$fila['numped'].'"><img src="icons/pdf.png" ></a></td></tr></table></br><hr ></div>';
		$nombresprod = "";
		
		unset($arcant);
		unset($arnom);
		unset($arpre);
	}
} else{
echo "No hay registros";
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