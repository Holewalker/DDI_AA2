<?php

class Session
{
    //Iniciamos la sesión
    function __construct()
    {
        //session_start();
    }

    public static function set(string $key, $valor)
    {
        $_SESSION[$key] = $valor;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public static function borrar_sesion()
    {
        $_SESSION = array();
        session_destroy();
        header("Location: topicListIndex.php");
    }
}

?>
