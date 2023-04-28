<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>FORO AA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-light bg-light">
    <div class="container justify-content-center">
        <a href="/AA2/index.php" class="btn btn-info m-1" type="button">Topics</a>
        <a href="/AA2/views/topicListIndex.php" class="btn btn-info m-1" type="button">WIP</a>
        <a href="/AA2/views/topicListIndex.php" class="btn btn-info m-1" type="button">WIP</a>
    </div>
    <a href="./views/topicListIndex.php" class="btn btn-info m-1" type="button">New topic! (WIP)</a>
    <?php
    //var_dump($_SESSION);
    if (isset($_SESSION['username'])) {
        ?>
        <a href="?endSession" class="btn btn-info m-1" type="button">End session</a>
        <?php echo $_SESSION['username'];
        if (isset($_GET['endSession'])) {
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }


    } else {
    ?>
    <a href="./views/loginForm.php" class="btn btn-info m-1" type="button">Login
        <?php

        } ?>
    </a>


</nav>
<div class="container-sm text-center justify-content-center w-25 mt-5">