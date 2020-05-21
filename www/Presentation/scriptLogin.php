<?php
    // Importazione delle classi presenti al livello di Business.
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    // Ricevo email e password dalla pagina del login
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gestoreUtente = new GestoreUtente();
    // Metodo effettuaLogin(): restituice un oggetto di classe Utente,
    // contenente l'utente loggato (se è stato trovato).
    $utenteConnesso = $gestoreUtente->effettuaLogin($email, $password);
    // Se l'utente è stato trovato:
    if ($utenteConnesso != null) {
        // Salvo l'oggetto nel cookie, sotto il nome di 'utenteConnesso'.
        $_SESSION['utenteConnesso'] = $utenteConnesso;
        header("Location: menuPrincipale.php");
    } else {
        // Altrimenti, torno alla pagina login.php passando un valore tramite la GET.
        header("Location: login.php?msg=1");
    }
?>