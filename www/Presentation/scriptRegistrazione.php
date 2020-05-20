<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $tipoUtente = $_POST['tipoUtente'];
    $gestoreUtente = new GestoreUtente();
    $risultato = $gestoreUtente->registraUtente($cognome, $nome, $email, $password, $tipoUtente);
    if ($risultato == 0) {
        header("Location: login.php?msg=2");
    } else {
        header("Location: registrazione.php?errore=1&tipo=$tipoUtente");
    }
?>