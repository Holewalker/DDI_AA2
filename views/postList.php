<?php
include("header.php");
require_once '../controller/post_controller.php';
?>
<div class="row pb-2">
    <h1>Post List:</h1>
</div>
<?php foreach ($posts

               as $post): ?>

    <div class="row justify-content-center mb-1">
        <div class="col">
            <td><?php echo $post['title'] ?></td>
        </div>
        <div class="col">
            <a href="/AA2/views/messageList.php?id=<?php echo $post['postId'] ?>" class="btn btn-info" type="button">See
                messages</a>
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

<div class="row mt-2">
    <div class="col text-align-left">
        <td><?php echo $post['message'] ?></td>
    </div>
<?php endforeach; ?>

<a href="/model/destroySession.php">Cerrar sesión</a>
</div>

</body>
</html>