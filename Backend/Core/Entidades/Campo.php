<?php

class Campo {

    private $campo_id;
    private $usuario_id;
    private $nombre;
    private $lat1;
    private $long1; 

    //Set y Get del id
    public function getId(){
		return $this->campo_id;
	}

	public function setId($campo_id){
		$this->campo_id = $campo_id;
    }
    
    public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
    }
    
    public function getLat1(){
		return $this->lat1;
	}

	public function setLat1($lat1){
		$this->lat1 = $lat1;
    }
    
    public function getLong1(){
		return $this->long1;
	}

	public function setLong1($long1){
		$this->long1 = $long1;
	}

	public function getUsuarioId(){
		return $this->usuario_id;
	}

	public function setUsuarioId($usuario_id){
		$this->$usuario_id = $usuario_id;
	}

}

?>
