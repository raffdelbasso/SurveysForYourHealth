<?php
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
    }
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });

    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $dataNascita = $_POST['dataNascita'];
    $sesso = $_POST['sesso'];
    $codUtente = unserialize($_SESSION['utenteConnesso'])->getIdUtente();
    $gestoreUtente = new GestoreUtente();
    $gestoreUtente->registraFiglio($cognome, $nome, $dataNascita, $sesso, $codUtente);
    header("Location: menuPrincipale.php");
?>