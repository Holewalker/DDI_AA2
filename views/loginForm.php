<?php
include("header.php");
?>


<body>
<h2>Login</h2>
<form action="loginForm.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Iniciar sesión">
</form>

<p>¿Aún no estás registrado? <a href="view/register.php">Registrar</a>.</p>


