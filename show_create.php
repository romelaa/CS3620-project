<?php
    require_once('./show/show.php');
    require_once('./sessioncheck.php');

    $show = new show();
    $show->setShowName($_POST['show_name']);
    $show->setShowRating($_POST['show_rating']);
    $show->setShowDescription($_POST['description']);
    $show->addShow($_SESSION['user_id']);

    header("Location: dashboard2.php");
?>