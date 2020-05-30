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
    $gestoreQuestionario = new GestoreQuestionario();
    $_SESSION['questionarioScelto'] = $gestoreQuestionario->cercaQuestionarioPerId($_GET['id']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Seleziona figlio</title>
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
    <div id="canvas" class="card container-md">
        <?php
            echo "<h2 align='center'>".$_SESSION['questionarioScelto']->getNome()."</h2>";
            $figli = $gestoreUtente->mostraFigli($utente->getIdUtente());
            echo "<form align='center' action=\"formCompilaQuestionario.php\" method=\"POST\" class=\"container-sm\" style=\"max-width: 400px\">
                  <select name='idFiglio' required>
                  <option value=''>Seleziona il figlio...</option>";
            for ($i=0; $i<count($figli); $i++) {
                $nome = $figli[$i]->getNome();
                $cognome = $figli[$i]->getCognome();
                $id = $figli[$i]->getIdFiglio();
                echo "<option value=\"$id\">$nome $cognome</option>";
            }
        ?>
            </select>
            <div class="mt-2" align='center'>
                <button type="submit" class="btn btn-primary">Continua</button>
            </div>
        </form>
        <div class="mt-2" align='center'>
            <button onclick="window.location.href='menuPrincipale.php'" class="btn btn-primary">Torna indietro</button>
        </div>
    </div>
    </body>

</html>
