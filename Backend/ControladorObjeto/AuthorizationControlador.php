<?php

require_once('../vendor/autoload.php');
require_once('../vendor/firebase/php-jwt/src/JWT.php');

use Firebase\JWT\JWT;

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME, "es_AR");

class AuthorizationControlador
{

    private $key = "MIC@MP@M@BILE"; //Token de Encriptación
    private static $encrypt = ['RS256']; //Tipo de Encriptación
    private $time;
    private $token;

    public function getJWT($userData)
    {

        $this->time = time();

        $this->token = array(
            'iat' => $this->time, // Tiempo que inició el token
            'exp' => $this->time + (60 * 60), // Tiempo que expirará el token (+1 hora)
            'data' => $userData
        );

        $jwt = JWT::encode($this->token, $this->key);

        return $jwt;
    }

    public function validateToken($jwt)
    {

        if (empty($token)) {
            throw new Exception("Invalid token supplied.");
        }

        $data = JWT::decode($jwt, $this->key, array('RS256'));

        return $data;
    }

    public static function checkToken($token)
    {
        if (empty($token)) {
            throw new Exception("Invalid token supplied.");
        }

        $decode = JWT::decode($token, self::$key, array('HS256'));

        if ($decode->aud !== self::Aud()) {
            throw new Exception("Invalid user logged in.");
        }
    }

    private static function Aud()
    {
        $aud = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }
}
