<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FORO AA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <div class="container justify-content-center">
        <a href="/views/topicListIndex.php" class="btn btn-info m-1" type="button">Topics</a>
        <a href="/views/topicListIndex.php" class="btn btn-info m-1" type="button">Login</a>
        <a href="/views/topicListIndex.php" class="btn btn-info m-1" type="button">Register</a>
    </div>
    <a href="/views/topicListIndex.php" class="btn btn-info m-1" type="button">New topic!</a>
</nav>
<div class="container-sm text-center justify-content-center w-25 mt-5">
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