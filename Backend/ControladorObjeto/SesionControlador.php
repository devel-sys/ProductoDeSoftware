<?php

include_once('../Datos/SesionDao.php');

class SesionControlador {

    private $sesionDao;

    public function __construct() {

        $this->sesionDao = new SesionDao();
    }

    public function iniciarSesion($usu_email, $usu_pass) {

        $inicioSesion = $this->sesionDao->sesionLogin($usu_email, $usu_pass);

        return $inicioSesion;
        
    }

    public function registrarSesion($usu_email) {
         
        $registrarSesion = $this->sesionDao->registrarSesion($usu_email);

        return $registrarSesion;
    }

    public function getSesionUsuario($ses_email, $ses_token) {

        $sesionUsuario = $this->sesionDao->getSesionUsuario($ses_email, $ses_token);

        return $sesionUsuario;

    }

    public function cerrarSesion($ses_token) {

        return $cerrarSesion = $this->sesionDao->cerrarSesion($ses_token);

    }

}