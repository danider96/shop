<html>
<head>
<?php
require('bd.php');
$con = new BD();
$con->conectar();
session_start();
if(!empty($_SESSION['admin'])){
	
	header("LOCATION:panadmin.php");
	
}
include("includes/header.php");
?>
<title>Tienda Dersys</title>
<script>
$(document).ready(function(){
	busque="";
    $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if ($(window).scrollTop() == $(document).height() - $(window).height() && lastID != 0 && i >= 12 && busque != "NO"){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'pag='+lastID,
                beforeSend:function(html){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('.contenedor').append(html);
                }
            });
        }
    });
});
</script>
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
                    $(".contenedor").html("<p align='center'><img src='icons/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $(".contenedor").empty();
                    $(".contenedor").append(data); 
						busque ="NO";
                    }
              });    
		}			  
        });        

});
</script>
<div class="sidebar-left">
</br>
<h3>Filtrar Productos</h3>
</br>
<b>Categoria:</b><select name="categoria" id="categ"> 
<option value="nada" selected >---</option>
<?php
$rescat = $con->ejecutar("select distinct categoria from articulos");
while($row_cat = $rescat->fetch_assoc()){
	
	echo '<option value="'.$row_cat['categoria'].'">'.$row_cat['categoria'].'</option>';
	
}
?>
</select></br></br>
<input id="filtro" type="button" value="Buscar">
</div>
<div class="contenedor">
<?php 
if(empty($_GET['filtrado']) or $_GET['filtrado'] == "---"){
echo'<h1>Productos:</h1>';
}else{
	echo '<h1>'.$_GET['filtrado'].'</h1>';
}
?>
<hr class="separador">
<script>

var filtro = document.getElementById("filtro");
filtro.addEventListener("click",function(){
	var categ = document.getElementById("categ");
	var valorcateg = categ.options[categ.selectedIndex].text; 
	location.href ="productos.php?filtrado="+valorcateg;
	
});
</script>
	
<?php

$contador=0;
if(empty($_GET['filtrado'])){
	
	$_GET['filtrado'] = " ";
	
}
if($_GET['filtrado'] == "---" or $_GET['filtrado'] == " " and empty($_GET['b'])){
	
$resultado = $con->ejecutar('select * from articulos order by 1 asc limit 12');
	if($resultado->num_rows >=1){
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$contador++;
		$linea = "";
		$i++;
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
			
			$comprarex = '<input class="boton" type="submit" value="Añadir al Carrito" />';
			$indiex = '<img src="icons/ok.png" width="15px" height="15px">';
			
		}else{
			$comprarex = '<div class="botondes">Añadir al Carrito</div>';
			$indiex = '<img src="icons/ko.png" width="15px" height="15px">';
			
		}
		if($contador == 4){
		
			$linea = '<hr class="separador">';
			$contador = 0;
		}
		if($fila['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="icons/oferta.png">';
		}else{
			$oferta = "";
		}
		echo '<div class="producto"><a href="producto.php?id='.$fila['codart'].'" ><img class="imgprod" src="'.$fila['imagen'].'">'.$oferta.'</a></br><h2>'.substr($fila['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$fila['precio'].'€</h2></br><b> Quedan '.$fila['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$fila['codart'].'" /></form></div>'.$linea;
		?><script> i = <?php echo $i; ?></script><?php
			if($i == 12){
				
				echo '<div class="load-more" lastID="'.$fila['codart'].'" style="display: none;"><img src="icons/ajax-loader.gif"/></div>';
			}
		}
	}
}else if(!empty($_GET['b'])){
	?><script>busque = "NO"</script><?php
$resultado = $con->ejecutar("select * from articulos where nombre LIKE '%$_GET[b]%'");
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
		if($fila['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="icons/oferta.png">';
		}else{
			$oferta = "";
		}
		echo '<div class="producto"><a href="producto.php?id='.$fila['codart'].'" ><img class="imgprod" src="'.$fila['imagen'].'">'.$oferta.'</a></br><h2>'.substr($fila['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$fila['precio'].'€</h2></br><b> Quedan '.$fila['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$fila['codart'].'" /></form></div>'.$linea;
			
		}
	}	
	
	
	
	
	
}else if($_GET['filtrado'] != "---" and $_GET['filtrado'] != " " and empty($_GET['b'])){
	$resultado = $con->ejecutar("select * from articulos where categoria = '$_GET[filtrado]' order by 1 asc limit 12");
	if($resultado->num_rows >=1){
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$contador++;
		$linea = "";
		$i++;
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
		if($fila['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="icons/oferta.png">';
		}else{
			$oferta = "";
		}
		echo '<div class="producto"><a href="producto.php?id='.$fila['codart'].'" ><img class="imgprod" src="'.$fila['imagen'].'">'.$oferta.'</a></br><h2>'.substr($fila['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$fila['precio'].'€</h2></br><b> Quedan '.$fila['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$fila['codart'].'" /></form></div>'.$linea;
			
			if($i == 12){
				
				echo '<div class="load-more" lastID="'.$fila['codart'].' '.$_GET['filtrado'].'" style="display: none;"><img src="icons/ajax-loader.gif"/></div>';
			}
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