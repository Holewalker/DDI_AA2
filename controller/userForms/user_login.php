<?php
if (!empty($_POST["login"])) {
    foreach ($_POST as $key => $value) {
        //elimina espacios en blanco del principio y final
        $value = trim($value);
        //si algun campo está vacío...
        // si el alias tiene menos de tres caracteres...
       /* if ($key == "username" && strlen($value) < $num = 3) {
            $mensaje = '<p class="error-form">El campo <b>' . $key . '</b> debe ser mayor que ' . $num . '</p>';
            $validacion = false;

            break;
            // si el password tiene menos de seis caracteres...
        } elseif ($key == "password" && strlen($value) < $num = 6) {
            $mensaje = '<p class="error-form">El campo <b>' . $key . '</b> debe ser mayor que ' . $num . '</p>';
            $validacion = false;
            break;
        }*/
    }

    $usuario = $controlador->checkUser($_POST["username"], $_POST["password"]);
    $_SESSION["username"] = $usuario->username;
    header('Location: /AA2/index.php');
} else {
    $_SESSION["formdatalogin"] = $_POST; //almacena los datos enviador por formulario


}

// end if validacion login