<?php
include '../datos/CampoDao.php';

class CampoControlador {

    private static $campoDao;

    public function __construct() {
        self::$campoDao = new CampoDao();
    }

    public function getCampos() {

        $campos = self::$campoDao->getCampos();

        return $campos;

    }

    public function getCampo() {

    }

    public function registrarCampo($cam_usuario, $cam_nombre, $campo_latitud, $campo_longitud) {

    }


}

?>
