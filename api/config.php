<?php 

class Config{
    const DATE_FORMAT = "Y-m-d H:i:s";

    const DB_HOST = "localhost";
    const DC_USERNAME = "root";
    const DB_PASSWORD = "KagamiTaiga10";
    const DB_SCHEME = "newsweb";

    const JWT_SECRET = "uhaiufhfbyuesfbiauk3fby3";
    const JWT_TOKEN_TIME = 604800;

    public static function get_env($name, $default){
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }

}



?>