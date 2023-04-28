
<section id="formulario">
    <div id="recuadro">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <?php require_once("../controller/user_controller.php"); ?>

            <h2 class="title-form">Register</h2>
            <div class="div-input">
                <input type="text" class="user-form" name="username" id="username" <?php echo (isset($username) ? 'value="'.$username.'"' : ''); echo (($campo == '$username' || $campo == null) ? 'autofocus':''); ?> placeholder="Username">
                <label id="label-form" for="usuario">Username</label>

            <div class="div-input">
                <input type="text" class="user-form" name="email" <?php echo (isset($email) ? 'value="'.$email.'"' : ''); echo ( $campo == 'email' ? 'autofocus':''); ?> placeholder="Email">
                <label class="label-user-form" id="label-form" for="nombre">Email</label>
            </div>

            <div class="div-input">
                <input type="password" class="user-form" name="password" <?php echo ( $campo == ('password'||'password2') ? 'autofocus':''); ?> placeholder="password">
                <label class="label-user-form" id="label-form" for="nombre">password</label>
            </div>
            <div class="div-input">
                <input type="password" class="user-form" name="password2" placeholder="Repeat password">
                <label class="label-user-form" id="label-form" for="nombre">Repeat password</label>
            </div>
            <input type="submit" name="register" value="Register">
        </form>
        <p class="p-registrar-login">Tienes una cuenta? <a class="log-reg" href="loginForm.php">Iniciar sesión</a></p>
    </div>
</section>
