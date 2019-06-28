<?php
namespace Modelo;

class dUsuario {

	protected $database ;
	
	public function __construct($container)
	{	
		$this->database = $container->database;
	}	


	public function datos(){
		$arr = $this->database->select('usuario', ['id','nombre', 'username','pass']);
		return $arr;
	}

	public function unusuario($id) {
		$data = $this->database->select( "usuario",['nombre',"username","pass"],["id"=>$id]);
		return $data;
	}
	
	public function agregar($nombre,$usuario, $pass) {
	
		$this->database->insert("usuario",["nombre" => "$nombre","username"=>"$usuario","pass"=>"$pass"]);
	}

	public function	modificar($id,$nombre,$usuario, $pass) {
		$data = $this->database->update("usuario",["nombre" => "$nombre","username"=>"$usuario","pass"=>"$pass"],["id"=>$id]);
		return $data;
	}

	public function eliminar($id) {
		
		$this->database->delete("usuario", [ "AND" => [ "id" => $id ] ]);
	}


}