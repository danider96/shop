<html>
<head>
<?php

session_start();
if(!empty($_SESSION['admin'])){
	
	header("LOCATION:panadmin.php");
	
}
include("includes/header.php");
?>
<title>Tienda Dersys</title>
<script>
$(document).ready(function(){
        var consulta;
        //hacemos focus al campo de búsqueda
        $("#miBusqueda").focus();
                                                                                                     
        //comprobamos si se pulsa una tecla
        $("#miBusqueda").keyup(function(e){
                                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#miBusqueda").val();
		if(consulta != ""){
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $(".contenedor").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $(".contenedor").empty();
                    $(".contenedor").append(data);                                                             
                    }
              });    
		}			  
        });  
});
</script>
<section id="jms-slideshow" class="jms-slideshow">
				<div class="step" data-color="color-1">
					<div class="jms-content">
						<h3>Aprovecha Nuestras Ofertas¡</h3>
						<p>Disponibles desde el 1 de Febrero hasta el 25 de Marzo¡</p>
						<a class="jms-link" href="http://localhost/shop/productos.php?filtrado=---">Ver Productos</a>
					</div>
					<img src="img/1.png" />
				</div>
				<div class="step" data-color="color-2" data-y="500" data-scale="0.4" data-rotate-x="30">
					<div class="jms-content" >
						<h3>Kit de Realidad Virtual!</h3>
						<p>Aprovecha ahora para comprar el producto estrella y vivelo tu mismo</p>
						<a class="jms-link" href="http://localhost/shop/productos.php?filtrado=Accesorios">Ver Producto</a>
					</div>
					<img src="img/2.png" />
				</div>
				<div class="step" data-color="color-3" data-x="2000" data-z="3000" data-rotate="170">
					<div class="jms-content">
						<h3>Componentes PC</h3>
						<p>Se han añadido nuevos Componentes para PC aprovecha ahora y hazte con ellos¡</p>
						<a class="jms-link" href="http://localhost/shop/productos.php?filtrado=Componentes%20PC">Ver Productos</a>
					</div>
					<img src="img/3.png" />
				</div>
				<div class="step" data-color="color-4" data-x="3000">
					<div class="jms-content">
						<h3>Nuevos Metodos de Pago!</h3>
						<p>Muy pronto se añadiran nuevos metodos de pago:Paypal</p>
					</div>
					<img src="img/4.png" />
				</div>
				<div class="step" data-color="color-5" data-x="4500" data-z="1000" data-rotate-y="45">
					<div class="jms-content">
						<h3>Bienvenidos a Dershop¡</h3>
						<p>La nueva tienda de electronica/informatica online</p>
					</div>
					<img src="img/5.png" />
				</div>
			</section>
			<script type="text/javascript">
			$(function() {
			
				$( '#jms-slideshow' ).jmslideshow();
				
			});
		</script>
<div class="sidebar-left" style="visibility:hidden;">
</br>
</div>
<div class="contenedor">
<h1>Top Ofertas¡</h1>
<hr class="separador">

<?php
require('bd.php');
$con = new BD();
$con->conectar();
$contador =0;
$resultado = $con->ejecutar("select * from articulos where oferta = 1");
if($resultado->num_rows >=1){
	while($fila = $resultado->fetch_assoc()){
		$contador++;
		$linea = "";
		if(strlen($fila['descripcion']) >= 1){
			
			$leermas = '<a class="botona" href="producto.php?id='.$fila['codart'].'" > Leer Descripcion</a>';
		}else{
			
			$leermas="";
			
		}
		if(strlen($fila['nombre']) <= 20){
			
			$salto = '</br><p style="visibility:hidden;">.</p>';
			
		}else{
			
			$salto="";
			
		}
		if($fila['existencias'] > 0){
			
			$comprarex = '<input id="anadir" class="boton" type="submit" value="Añadir al Carrito" />';
			$indiex = '<img src="icons/ok.png" width="15px" height="15px">';
			
		}else{
			$comprarex = '<div class="botondes">Añadir al Carrito</div>';
			$indiex = '<img src="icons/ko.png" width="15px" height="15px">';
			
		}
		if($contador == 4){
		
			$linea = '<hr class="separador">';
			$contador = 0;
		}
		echo '<div class="producto"><a href="producto.php?id='.$fila['codart'].'" ><img class="imgprod" src="'.$fila['imagen'].'"><img class="imgofer" src="icons/oferta.png"></a></br><h2>'.substr($fila['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$fila['precio'].'€</h2></br><b> Quedan '.$fila['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$fila['codart'].'" /></form></div>'.$linea;
		
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