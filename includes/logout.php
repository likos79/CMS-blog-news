<?php session_start(); ?>

<?php
    session_destroy();

    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_type']);


header("Location: ../index.php");


?>