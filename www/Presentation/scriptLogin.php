<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gestoreUtente = new GestoreUtente();
    $utenteConnesso = $gestoreUtente->effettuaLogin($email, $password);
    if ($utenteConnesso != null) {
        $_SESSION['utenteConnesso'] = $utenteConnesso;
        header("Location: menuPrincipale.php");
    } else {
        header("Location: login.php?msg=1");
    }
?>