<?php
    // Importazione delle classi presenti al livello di Business.
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    // Ricezione dei dati tramite metodo POST.
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    // La password viene cifrata mediante l'md5.
    $password = md5($_POST['password']);
    $tipoUtente = $_POST['tipoUtente'];
    $gestoreUtente = new GestoreUtente();
    // Richiamo del metodo registraUtente(): restituisce un valore numerico.
    // 0: tutto apposto
    // 1: email già inserita
    $risultato = $gestoreUtente->registraUtente($cognome, $nome, $email, $password, $tipoUtente);
    if ($risultato == 0) {
        header("Location: login.php?msg=2");
    } else {
        header("Location: registrazione.php?errore=1&tipo=$tipoUtente");
    }
?>