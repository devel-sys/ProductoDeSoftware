<?php
include '../datos/CampoDao.php';

class CampoControlador {

    private static $campoDao;

    public function __construct() {
        self::$campoDao = new CampoDao();
    }

    public function getCampos($propietario_id) {

        $campos = self::$campoDao->getCampos($propietario_id);

        return $campos;
    }

    public function getCampo($campo_propietario_id, $campo_id) {

    }

    public function registrarCampo($cam_usuario, $cam_nombre, $campo_latitud, $campo_longitud) {

    }


}

?>
