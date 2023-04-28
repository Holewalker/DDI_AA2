<?php
include("header.php");
require_once '../controller/post_controller.php';
?>

<?php foreach ($posts

               as $post): ?>

    <div class="row justify-content-center mb-1">
        <div class="col">
            <?php echo $post['title'] ?></td>
        </div>
        <div class="col">
            <a href="/views/postList.php?topicId=<?php echo $post['topicId'] ?>" class="btn btn-info" type="button">See
                posts</a>
        </div>
        <div class="col">
            <a href="/views/topicListIndex.php"
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
</div>

</body>
</html>