<?php
    include_once '../models/login_model.php';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $login = new LoginModel();
        if ($login->verifyUser($_POST['email'], $_POST['password'])) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            header("location: ../home.php");
        } else {
            header("location: ../home.php");
        }
    }
?>
