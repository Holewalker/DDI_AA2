<?php
include("header.php");
?>



    <?php foreach ($topics

                   as $topic): ?>

        <div class="row justify-content-center mb-1">
            <div class="col">

                <?php echo $topic['name'] ?></td>
            </div>
            <div class="col">
                <a href="/views/topicListIndex.php" class="btn btn-info" type="button">See posts</a>
            </div>


            <div class="col">
                <a href="/views/topicListIndex.php"
                    <?php if (isset($_SESSION['admin'])) {
                        if ($_SESSION['admin'] == 'admin') { ?>
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