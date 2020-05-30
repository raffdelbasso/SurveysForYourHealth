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
    <div id="canvas" class="card container-md">
        <h2 align='center'>Benvenuto, <?php echo $utente->getNome(); ?>.</h2>
    <?php
        if ($utente->getTipoUtente() == 1) {
            if ($gestoreUtente->numeroFigli($utente->getIdUtente()) == 0) {
                require "formPrimoFiglio.php";
            } else {
                header("Location: menuGenitore.php");
            }
        }
    ?>
    </div>
</body>

</html>