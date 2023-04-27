<?php
include("header.php");
?>
<?php
if(isset($_GET["register"])){
    require_once("register.php");
}else{
?>

<body>
<h2>Login</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <?php require_once("../controller/user_controller.php"); ?>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Iniciar sesión">
</form>

<p>¿Aún no estás registrado? <a class="log-reg" href="<?php echo "?register" ?>">Registrarse</a></p>


    <?php }