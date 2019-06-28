<?php
namespace Modelo;

class dAlumno extends dUsuario {



	public function conexion(){
		parent::__construct($container);
	}

	public function contructoralumnos(){
		parent::constructorUsuario();
	}

	public function datos(){
		$arr = $this->database->select('alumno', ['rut', 'carrera','id_usuario']);
		return $arr;
	}

		public function unalumnos($rut) {
		$data = $this->database->select( "alumno",['carrera',"id_usuario"],["rut"=>$rut]);
		return $data;
	}
	
	public function agregarA($rut,$carrera,$nombre,$usuario,$pass) {

		parent::agregar($nombre,$usuario,$pass);
		$id = $this->database->max('usuario','id');
		$this->database->insert("alumno",["rut"=>$rut,"carrera" => "$carrera",'id_usuario' => $id]);
	}

	public function	modificarA($rut,$carrera,$nombre,$usuario, $pass) {
		$ide= $this->database->select("alumno",["id_usuario"],["rut"=>$rut]);
		$data = $this->database->update("alumno",["carrera" => "$carrera"],["rut"=>$rut]);
		return parent::modificar($ide[0],$nombre,$usuario, $pass);
		return $data;
	}

	public function eliminarA($rut) {
		$ide= $this->database->select("alumno",["id_usuario"],["rut"=>$rut]);
		$this->database->delete("alumno", [ "AND" => [ "rut" => "$rut" ]]);
		parent::eliminar($ide[0]);
		
	}





}