<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
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
    <div id="canvas" class="myCard card container-md">
        <h2 align='center'>Seleziona questionario da compilare:</h2><br> 
         <?php
            $gestoreQuestionario = new GestoreQuestionario();
            $questionari = $gestoreQuestionario->mostraQuestionari();
            for ($i=0; $i<count($questionari); $i++) {
                if ($i % 2 == 0) {
                    echo "<div class=\"form-row form-group\" align='center'>";
                }
                echo "<a align='center' href='formSelezionaFiglio.php?id=".$questionari[$i]->getIdQuestionario()."'>";
                    echo "<div class='col' style=\"max-width: 50%;\">";
                        echo "<div class=\"card\" style=\"width: 18rem;\">";
                            echo "<img class=\"card-img-top\" src=\"img/puzzle.jpeg\" alt=\"Card image cap\">";
                            echo "<div class=\"card-body\">";
                                echo "<p class=\"card-text\" align=\"center\">";
                                    echo $questionari[$i]->getNome()."</a>";
                                echo "</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                if ($i % 2 == 1) {
                    echo "</div>";
                }
            }
        ?>
    </div>
    </body>

</html>
