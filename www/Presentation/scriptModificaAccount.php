<?php
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: login.php");
    }
    // Importazione delle classi presenti al livello di Business.
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    // Ricezione dei dati tramite metodo POST.
    
?>