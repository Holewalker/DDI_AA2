<?php
if (!empty($_POST["register"])) {
    $password2 = $_POST["password2"];
    foreach ($_POST as $key => $value) {

        $value = trim($value);
        //si algun campo está vacío...
        if ($value == "") {
            $mensaje = '<p class="error-form">El campo <b>' . $key . '</b> no puede estár vacío</p>'; // asigna mensaje de error
            $validacion = false;
            header("Location:" . $_SERVER['PHP_SELF'] . "?registrar=no&campo=$key"); //redirecciona detallando el campo que falló
            break;
            // si el alias tiene menos de tres caracteres...
        } elseif ($key == "username" && strlen($value) < $num = 3) {
            $mensaje = '<p class="error-form">The field <b>' . $key . '</b> must be greater than ' . $num . '</p>';
            $validacion = false;

            break;
            // si el password tiene menos de seis caracteres...
        } elseif ($key == "password" && strlen($value) < $num = 6) {
            $mensaje = '<p class="error-form">the field <b>' . $key . '</b> must be greater than ' . $num . '</p>';
            $validacion = false;
            break;
        } elseif ($key == "email") {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $mensaje = '<p class="error-form">email <b>' . $value . '</b> is not ok.</p>';
                $validacion = false;
                header("Location:" . $_SERVER['PHP_SELF'] . "?registrar=no&campo=$key");
                break;
            }
        }
    }

    $usuario = $controlador->createUser($_POST["username"], $_POST["email"], $_POST["password"]);
} else {
    $_SESSION["formdatalogin"] = $_POST; //almacena los datos enviador por formulario
    //$_SESSION["mensajelogin"] = $mensaje; // almacena el mensaje de error
}

// end if validacion login