<?php

include_once('../Datos/SesionDao.php');

class SesionControlador {

    public function iniciarSesion($usu_email, $usu_pass) {

        $sesionDao = new SesionDao();

        $inicioSesion = $sesionDao->sesionLogin($usu_email, $usu_pass);

        return $inicioSesion;
        
    }

    public function registrarSesion($usu_email) {
         
        $sesionDao = new SesionDao();

        $registrarSesion = $sesionDao->registrarSesion($usu_email);

        return $registrarSesion;
    }

    public function getSesionUsuario($ses_email, $ses_token) {

        $sesionDao = new SesionDao();

        $sesionUsuario = $sesionDao->getSesionUsuario($ses_email, $ses_token);

        return $sesionUsuario;

    }

}