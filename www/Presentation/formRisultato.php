<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
    } else {
        $utente = unserialize($_SESSION['utenteConnesso']);
    }
    if (!isset($_GET['msg'])) {
        header("Location: menuPrincipale.php");
    } else {
        $questionarioScelto = unserialize($_SESSION['questionarioScelto']);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Compila questionario</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="modificaFigli.php">I tuoi figli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="formModificaAccount.php">Modifica account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scriptLogout.php">Esci</a>
                </li>
            </div>
        </nav>
        <div id="canvas" align='center' class="card container-md">
            <?php
                echo "<h2 align='center'>".$questionarioScelto->getNome()."</h2>";
                echo "<h2 align='center'>Risultato:</h2>";
                if ($_GET['msg'] == 0) {
                    echo "<p>Suo figlio non è a rischio.</p>";
                } else {
                    echo "<p>Suo figlio è a rischio. È consigliato rivolgersi da uno specialista per ulteriori controlli.</p>";
                }
                $_SESSION['questionarioScelto'] = "";
            ?>
            <div class="mt-2" align='center'>
                <button onclick="window.location.href='menuPrincipale.php'" class="btn btn-primary">Torna indietro</button>
            </div>
        </div>
    </body>
</html>