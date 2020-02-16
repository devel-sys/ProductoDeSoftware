<?php

class Lote {

    private $lote_id;
    private $campo_id;
    private $nombre;
    private $tamano;
    private $lat1;
    private $long1;
    private $lat2;
    private $long2;     
    private $lat3;
    private $long3;     
    private $lat4;
    private $long4;  
    private $estado_id;

    //Set y Get del id
    public function getId(){
		return $this->lote_id;
	}

	public function setId($lote_id){
		$this->lote_id = $lote_id;
    }

     public function getCampoId(){
		return $this->campo_id;
	}

	public function setCampoId($campo_id){
		$this->campo_id = $campo_id;
    }
    
    
    public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
    }

    public function getTamano(){
		return $this->tamano;
	}

	public function setTamano($tamano){
		$this->tamano = $tamano;
    }
    
    public function getLat1(){
		return $this->lat1;
	}

	public function setLat1($lat1){
		$this->lat1 = $lat1;
    }
    
    public function getLong2(){
		return $this->long2;
	}

	public function setLong2($long2){
		$this->long2 = $long2;
	}

	public function getLong3(){
		return $this->long3;
	}

	public function setLong3($long3){
		$this->long3 = $long3;
	}

	public function getLong4(){
		return $this->long4;
	}

	public function setLong4($long4){
		$this->long4 = $long4;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

}

?>
