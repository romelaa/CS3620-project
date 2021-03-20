<?php
    require_once('./show/show.php');
    require_once('sessioncheck.php');

    $show = new show();
    $shows = $show->deleteShow($_SESSION["user_id"], $_GET["show_id"]);

    header("Location: dashboard2.php?del=true");
?>