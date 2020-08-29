<?php
    session_start();

    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    unset($_COOKIE['email']);
    unset($_COOKIE['senha']);
    unset($_COOKIE['id']);
    setcookie('email', null, -1, '/');
    setcookie('senha', null, -1, '/');
    setcookie('id', null, -1, '/');  

    session_destroy();

    header("Location: login_dev.php");
?>