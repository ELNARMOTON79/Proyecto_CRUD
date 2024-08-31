<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	class Conexion
	{
		private $host='localhost';
		private $usuario='root';
		private $password = '';
		private $base='escuela';
		public $sentencia;
		private $rows =array();
		private $conexion;	

		private function abrir_conexion(){
			$this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
		}

		private function cerrar_conexion(){
			$this->conexion->close(); 
		}

		public function ejecutar_sentencia(){
			$this->abrir_conexion();
			$bandera = $this->conexion->query($this->sentencia);
			$this->cerrar_conexion();
			return $bandera;
		}

		public function obtener_sentencia(){
			$this->abrir_conexion();
			$result = $this->conexion->query($this->sentencia);
			return $result;
		}
	}

?>