<?php
class BD {
	private $conexion;
	private $resultado;
	private $numFilas;
	private $fila;
	
	
	function conectar(){
	
		$this->conexion = new mysqli('localhost','dani','dani','dershop');

		if($this->conexion->connect_error) {die('Error de Conexion ('.$this->conexion->connect_errno.') '.$this->conexion->connect_error);
		}

	}
	function desconectar(){
		
		$this->conexion->close();
		
	}
	function ejecutar($sql){
		
		
		return $this->conexion->query($sql);
		
		
	}
	function check(){
		
		return $this->conexion->affected_rows;
		
	}

}
?>