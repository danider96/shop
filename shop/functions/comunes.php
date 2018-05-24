<?php
function contarValoresArray($array){

	$contar=array();

 

	foreach($array as $value)

	{

		if(isset($contar[$value]))

		{

			// si ya existe, le añadimos uno

			$contar[$value]+=1;

		}else{

			// si no existe lo añadimos al array

			$contar[$value]=1;

		}

	}

	return $contar;

}
?>