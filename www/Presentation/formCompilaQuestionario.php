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
    $questionarioScelto = $_SESSION['questionarioScelto'];
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
    <form action="scriptCalcolaPunteggio.php" method="POST">
    <input type="hidden" name='idFiglio' value=<?php echo "'". $_POST['idFiglio'] . "'"; ?>></input>
        <div>
            <?php
                $cont = 0;
                echo "<h2 align='center'>".$questionarioScelto->getNome()."</h2><br>";
				echo "<p align='center' class='h5'> NOTA: Tutte le domande sono obbligatorie. </p><br>";
                $questionarioScelto = $gestoreQuestionario->riempiQuestionario($questionarioScelto);
                for ($i=0; $i<$questionarioScelto->numDomande(); $i++) {
                    echo "<p class\"text-left\">".($i+1).") ".$questionarioScelto->getDomandaAt($i)->getTesto()."</p>";
                    echo "<div>";
                        echo "<div class=\"form-check\">";
                    for ($j=0; $j<$questionarioScelto->getDomandaAt($i)->numOpzioni(); $j++) {
                        $opzione = $questionarioScelto->getDomandaAt($i)->getOpzioneAt($j);
                        echo "<input name=\"domanda".$questionarioScelto->getDomandaAt($i)->getIdDomanda()."\" type=\"radio\" id=\"radio".($cont)."\" value='".$opzione->getIdOpzione()."' required></input>";    
                            echo "<label for=\"radio".($cont)."\">".$opzione->getTesto()."</label><br>";
                        $cont++;
                    }
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            <input type="submit" value="Conferma"></input>
        
        </div>
    </body>


</html>
