<?php

class Usuario {

    private $usuario_id;
	private $nombre;
    private $apellido;
	private $correo;
	private $telefono;
    private $contrasena;
    private $privilegio_id;
    private $fecha_registro;

	//Set y Get del id
    public function getId(){
		return $this->usuario_id;
	}

	public function setId($usuario_id){
		$this->usuario_id = $usuario_id;
	}

	//Set y Get del nombre
	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	//Set y Get del Apellido
	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	//Set y Get del Correo
	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	//Set y Get de la contrasena
	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	//Set y Get del telefono
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
		
	public function getTelefono(){
		return $this->telefono;
	}
	
	//Set y Get del privilegio
	public function getPrivilegioId(){
		return $this->privilegio_id;
	}

	public function setPrivilegioId($privilegio_id){
		$this->privilegio_id = $privilegio_id;
	}

	//Set y Get de la fecha_registro
	public function getFecha_registro(){
		return $this->fecha_registro;
	}

	public function setFecha_registro($fecha_registro){
		$this->fecha_registro = $fecha_registro;
	}
}

?>
