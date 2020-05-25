<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: login.php");
    } else {
        $utente = unserialize($_SESSION['utenteConnesso']);
    }
    $gestoreUtente = new GestoreUtente();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Menu principale</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Benvenuto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modificaFigli.php">I tuoi figli</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modificaAccount.php">Modifica account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Esci</a>
            </li>
        </div>
    </nav>
    </body>

</html>
