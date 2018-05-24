<link rel="stylesheet" type="text/css" href="style.css" />

<?php
	require('bd.php');
 
  session_start();
      
        
      if(!empty($_POST['b'])) {
		  $buscar = $_POST['b'];
            buscar($buscar);
      }
      
      function buscar($b) {
		  $contador = 0;
            $con = new BD();
			$con->conectar();
            $resultado = $con->ejecutar("SELECT * FROM articulos WHERE nombre LIKE '%".$b."%'");
              
            $contar = $resultado->num_rows;
              
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
              while($row= $resultado->fetch_assoc()){
				  $contador++;
		$linea = "";
		if(strlen($row['descripcion']) >= 1){
			
			$leermas = '<a class="botona" href="producto.php?id='.$row['codart'].'" > Leer Descripcion</a>';
		}else{
			
			$leermas="";
			
		}
		if(strlen($row['nombre']) <= 20){
			
			$salto = '</br><p style="visibility:hidden;">.</p>';
			
		}else{
			
			$salto="";
			
		}
		if($row['existencias'] > 0){
			
			$comprarex = '<input id="anadir" class="boton" type="submit" value="Añadir al Carrito" />';
			$indiex = '<img src="img/ok.png" width="15px" height="15px">';
			
		}else{
			$comprarex = '<div class="botondes">Añadir al Carrito</div>';
			$indiex = '<img src="img/ko.png" width="15px" height="15px">';
			
		}
		if($contador == 4){
		
			$linea = '<hr class="separador">';
			$contador = 0;
		}
		if($row['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="img/oferta.png">';
		}else{
			$oferta = "";
		}
                echo '<div class="producto"><a href="producto.php?id='.$row['codart'].'" ><img class="imgprod" src="'.$row['imagen'].'">'.$oferta.'</a></br><h2>'.substr($row['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$row['precio'].'€</h2></br><b> Quedan '.$row['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$row['codart'].'" /></form></div>'.$linea;
            }
        }
  }
	
      
       
      if(!empty($_POST['mail'])) {
		  $user = $_POST['mail'];
            comprobar($user);
      }
       
      function comprobar($mail) {
            $con = new BD();
			$con->conectar();
            $resultado = $con->ejecutar("SELECT * FROM usuarios WHERE correo = '".$mail."'");
             
            $contar = $resultado->num_rows;
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:orange;'>El nombre de usuario ya existe.</span>";
            }
      }     
?>

<?php
if(isset($_POST["pag"]) && !empty($_POST["pag"]) and is_numeric($_POST['pag'])){
$con = new BD();
$con->conectar();
//Get last ID
$lastID = $_POST['pag'];

//Limit on data display
$showLimit = 4;

//Get all rows except already displayed
$queryAll = $con->ejecutar("SELECT COUNT(*) as num_rows FROM articulos WHERE codart > '$lastID' ORDER BY codart DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
$query = $con->ejecutar("SELECT * FROM articulos WHERE codart > '$lastID' ");

if($query->num_rows >= 1){
	$contador=0;
    while($row = $query->fetch_assoc()){ 
        $postID = $row["codart"]; 
        $contador++;
		$linea = "";
		if(strlen($row['descripcion']) >= 1){
			
			$leermas = '<a class="botona" href="producto.php?id='.$row['codart'].'" > Leer Descripcion</a>';
		}else{
			
			$leermas="";
			
		}
		if(strlen($row['nombre']) <= 20){
			
			$salto = '</br><p style="visibility:hidden;">.</p>';
			
		}else{
			
			$salto="";
			
		}
		if($row['existencias'] > 0){
			
			$comprarex = '<input class="boton" type="submit" value="Añadir al Carrito" />';
			$indiex = '<img src="img/ok.png" width="15px" height="15px">';
			
		}else{
			$comprarex = '<div class="botondes">Añadir al Carrito</div>';
			$indiex = '<img src="img/ko.png" width="15px" height="15px">';
			
		}
		if($contador == 4){
		
			$linea = '<hr class="separador">';
			$contador = 0;
		}
		if($row['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="img/oferta.png">';
		}else{
			$oferta = "";
		}
		echo '<div class="producto"><a href="producto.php?id='.$row['codart'].'" ><img class="imgprod" src="'.$row['imagen'].'">'.$oferta.'</a></br><h2>'.substr($row['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$row['precio'].'€</h2></br><b> Quedan '.$row['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$row['codart'].'" /></form></div>'.$linea;
		} 
 if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <img src="icons/ajax-loader.gif"/>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        
    </div>
<?php }
    }else{ ?>
    <div class="load-more" lastID="0">
        
    </div>
<?php
    }
}else if(isset($_POST["pag"]) && !empty($_POST["pag"]) and !is_numeric($_POST["pag"])){
$con = new BD();
$con->conectar();
//Get last ID
$ides = explode(' ',$_POST['pag']);
$lastID = $ides[0];
$categ = $ides[1];
//Limit on data display
$showLimit = 4;

//Get all rows except already displayed
$queryAll = $con->ejecutar("SELECT COUNT(*) as num_rows FROM articulos WHERE codart > '$lastID' and categoria = '$categ' ORDER BY codart DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
$query = $con->ejecutar("SELECT * FROM articulos WHERE codart > '$lastID' and categoria = '$categ' ");

if($query->num_rows >= 1){
	$contador=0;
    while($row = $query->fetch_assoc()){ 
        $postID = $row["codart"]; 
        $contador++;
		$linea = "";
		if(strlen($row['descripcion']) >= 1){
			
			$leermas = '<a class="botona" href="producto.php?id='.$row['codart'].'" > Leer Descripcion</a>';
		}else{
			
			$leermas="";
			
		}
		if(strlen($row['nombre']) <= 20){
			
			$salto = '</br><p style="visibility:hidden;">.</p>';
			
		}else{
			
			$salto="";
			
		}
		if($row['existencias'] > 0){
			
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
		if($row['oferta'] == 1){
		
			$oferta = '<img class="imgofer" src="img/oferta.png">';
		}else{
			$oferta = "";
		}
		echo '<div class="producto"><a href="producto.php?id='.$row['codart'].'" ><img class="imgprod" src="'.$row['imagen'].'">'.$oferta.'</a></br><h2>'.substr($row['nombre'],0,20).$salto.'</h2></br><p>'.$leermas.'</p><h2>'.$row['precio'].'€</h2></br><b> Quedan '.$row['existencias'].$indiex.'</b></br></br><form method="POST" action="anadircarrito.php" >'.$comprarex.'<input type="hidden" name="codart" value="'.$row['codart'].'" /></form></div>'.$linea;
		} 
 if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <img src="icons/ajax-loader.gif"/>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        
    </div>
<?php }
    }else{ ?>
    <div class="load-more" lastID="0">
        
    </div>
<?php
    }
}
?>