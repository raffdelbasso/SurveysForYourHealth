<?php
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: login.php");
    }
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });

    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $dataNascita = $_POST['dataNascita'];
    $codUtente = unserialize($_SESSION['utenteConnesso'])->getIdUtente();
    $gestoreUtente = new GestoreUtente();
    $gestoreUtente->registraFiglio($cognome, $nome, $dataNascita, $codUtente);
    header("Location: menuPrincipale.php");
?>