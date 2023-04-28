<?php
include("header.php");
require_once '../controller/message_controller.php';
?>
<div class="row pb-2">
    <h1>Messages:</h1>
</div>
<?php foreach ($messages

               as $message):

    $user = $userController->getUserById($message['userId']);

    ?>

    <div class="row justify-content-center mb-1">
        <div class="col">
            <?php echo $message['message'] ?></td>
        </div>
        <div class="col">
           Sent by: <?php echo $user['username'] ?></td>
        </div>

        <div class="col">
            <a href=""
                <?php if (isset($_SESSION['admin'])) {
                    if ($_SESSION['username'] == 'admin') { ?>
                        class="btn btn-warning"
                    <?php }
                } else ?>
                    class="btn disabled btn-warning"
                    <?php
                ?>
               type="button">Delete</a>
        </div>


    </div>

<?php endforeach; ?>

<a href="/model/destroySession.php">Cerrar sesión</a>

</body>
</html>