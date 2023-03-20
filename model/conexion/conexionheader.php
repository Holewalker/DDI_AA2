<?php
global $conexion;
$conexion = mysqli_connect(host, user, pass, dbname) or die ("No se pudo realizar la conexión! <br>");
echo "Conexión realizada con éxito! <br>";

$consulta = "SELECT * FROM users";
$datos = mysqli_query($conexion, $consulta);


//mysqli_close($conexion);