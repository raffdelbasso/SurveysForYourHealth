<?php
// Importazione delle classi presenti al livello di Business.
spl_autoload_register(function ($class) {
    require_once '../Business/' . $class . '.class.php';
});

session_start();
if (isset($_SESSION['utenteConnesso'])) {
    header("Location: menuPrincipale.php");
}
// Controllo della presenza del tipo utente
if (!isset($_GET['tipo'])) {
    header("Location: formSceltaTipo.php");
} else {
    // Controllo che sia un tipo utente esistente
    $tipo = $_GET['tipo'];
    if ($tipo < 1 || $tipo > 3) {
        header("Location: formSceltaTipo.php");
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrazione</title>
</head>

<body>
    <div id="canvas" class="card container-md">
        <h2 align='center'>Registrazione</h2>

        <?php
        if ($tipo == 1) {
            $stringaTipo = 'Genitore';
        } elseif ($tipo == 2) {
            $stringaTipo = 'Psicologo';
        } elseif ($tipo == 3) {
            $stringaTipo = 'Pediatra';
        }

        echo "<p align=\"center\">Ti stai registrando come: <a href=\"formSceltaTipo.php\">$stringaTipo</a></p>"

        ?>

        <form action="scriptRegistrazione.php" id='form-registrazione' method="POST" class="container-sm" style="max-width: 400px">
            <input type="hidden" name="tipoUtente" value=<?php echo $_GET['tipo']; ?>>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="col">
                    <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
                </div>
            </div>

            <?php
            if ($tipo == 1) {

                echo "<div class=\"form-group\">
                    <select name=\"codPediatra\" class=\"custom-select\" id=\"input-seleziona-pediatra\" required>
                    <option selected value=\"\">Seleziona il tuo pediatra...</option>";
                $gestoreUtente = new GestoreUtente();
                $pediatri = $gestoreUtente->mostraPediatri();
                $nPediatri = count($pediatri);

                for ($i = 0; $i < $nPediatri; $i++) {
                    $nome = $pediatri[$i]->getNome();
                    $cognome = $pediatri[$i]->getCognome();
                    $id = $pediatri[$i]->getIdUtente();

                    echo "<option value=\"$id\">$nome $cognome</option>";
                }
                echo "</select>
            </div>";
            }
            ?>


            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Indirizzo email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" onkeyup="validaPassword()" placeholder="Password" id="input-password-registrazione" required>
                <ul>
                    <li class='text-sm-left' id='psw1'><small>La password deve contenere almeno 6 caratteri</small></li>
                    <li class='text-sm-left' id='psw2'><small>La password deve contenere almeno un numero</small></li>
                </ul>
            </div>
            <div class="form-check" style="vertical-align: baseline;" >
                <input class="form-check-input" type="checkbox" id="check-mostra-psw" onclick="mostraPassword()">
                <label for="check-mostra-psw" class="form-check-label user-select-none">Mostra password</label>
            </div>

            <div class="mt-2" align='center'>
                <button type="button" id='button-submit' onclick="<?php if ($_GET['tipo'] == 1) { echo "inviaForm()"; } else { echo "inviaForm2()"; }?>" class="btn btn-primary">Registrati</button>
            </div>
        </form>
        <?php
        if (isset($_GET['errore'])) {
            echo "<h3 align='center'>Email già utilizzata.</h3>";
        }
        ?>
        <p style="text-align: center; margin-top: 20px">Sei già registrato? <a href="index.php">Accedi ora</a></p>
    </div>

    <script src="js/script.js"></script>
</body>

</html>