<?php
    // Comincio la sessione e la cancello: l'utente non è più salvato nei cookie
    // e viene reindirizzato alla pagina di login.
    session_start();
    session_unset();
    header("Location: login.php");
?>