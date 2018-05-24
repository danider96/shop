<?php
include '../classes/bd.php';
include '../classes/FootballData.php';
$con = new BD();
	$conex = new BD();
	$conex->conectar();
	$con->conectar();

if(!empty($_POST['partidos'])){
    $partidos = json_decode($_POST['partidos'], true);
    $cuotas = json_decode($_POST['cuotas'], true);
    $liga = json_decode($_POST['liga'], true);
	$con->ejecutar('select * from eventos where liga ='.$liga.'');
	while($fila = $con->resultadoQuery($con->getResultado())){
		for($i=0; $i < count($partidos);$i++){
			similar_text(htmlentities($fila['partido']),htmlentities($partidos[$i]),$porcentaje);
				
			if($porcentaje >= 78){
				
				$valores = explode(" ",$cuotas[$i]);
				$conex->ejecutar('update eventos set `1` = "'.$valores[0].'", `x` = "'.$valores[1].'", `2` = "'.$valores[2].'" where codevento = '.$fila['codevento'].'');
				echo "actualizado";
					
			}else{
				echo htmlentities($fila['partido']).'==='.htmlentities($partidos[$i]).' ->'.$porcentaje.'|||';
			}

		}

	}


}else if(!empty($_POST['noti'])){
	
	$con->ejecutar('select * from apuestas where correo = "'.$_POST['noti'].'" and visto ="NO" and (estado = "Ganada" or estado = "Perdida")');
	echo '<p id="numnoti" style="display:none;">'.$con->check().'</p>';
	while($fila = $con->resultadoQuery($con->getResultado())){
		$conex->ejecutar('select partido from eventos where codevento = '.$fila['evento'].'');
		$res = $conex->resultadoQuery($conex->getResultado());
		echo '
		<li id='.$fila['idApuesta'].'><label for="mensaje">Apuesta '.$fila['estado'].'</label><p>El partido '.$res['partido'].' ha acabado '.$fila['resultadoObtenido'].'</p><a class="removenoti"><span class="glyphicon glyphicon-remove"></span></a></li>';
		
		
	}
	
	
	
}else if(!empty($_POST['removenoti'])){
	
	$con->ejecutar('update apuestas set visto = "SI" where idApuesta = '.$_POST['removenoti'].'');
	echo "ELIMINADA";
	
	
}
	
		// echo  JSON_encode($cuotas);
    ?>
