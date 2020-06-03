<?php
// Importazione delle classi presenti al livello di Business.
spl_autoload_register(function ($class) {
    require_once '../Business/' . $class . '.class.php';
});

session_start();
if (!isset($_SESSION['utenteConnesso'])) {
    header("Location: index.php");
}

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
    <title>Modifica account</title>
</head>

<body>
    <div id="canvas" class="card container-md">
        <h2 align='center'>Modifica account</h2>
        <br>
        <form action="scriptModificaAccount.php" id="form-registrazione" method="POST" class="container-sm" style="max-width: 400px">
            <input type="hidden" name="idUtente" value=<?php echo "" . $utente->getIdUtente() . ""; ?>>
            <input type="hidden" name="vecchiaEmail" value=<?php echo "" . $utente->getEmail() . ""; ?>>
            <input type="hidden" name="tipoUtente" value=<?php echo "" . $utente->getTipoUtente() . ""; ?>>
            <div class="form-row form-group">
                <div class="col">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required value=<?php echo "\"" . $utente->getNome() . "\""; ?>>
                </div>
                <div class="col">
                    <input type="text" name="cognome" class="form-control" placeholder="Cognome" required value=<?php echo "\"" . $utente->getCognome() . "\""; ?>>
                </div>
            </div>

            <?php
            if ($utente->getTipoUtente() == 1) {

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
                <input type="email" name="email" class="form-control" placeholder="Indirizzo email" required value=<?php echo "" . $utente->getEmail() . ""; ?>>
            </div>
            <div class="form-group">
                <input type="password" name="vecchiaPassword" class="form-control" onkeyup="validaPassword3()" id='vecchia-password' placeholder="Vecchia password" required>
            </div>
            <div class="form-group">
                <input type="password" name="nuovaPassword" class="form-control" onkeyup="validaPassword2()" placeholder="Nuova password" id="input-password-registrazione" required>
                <ul>
                    <li class='text-sm-left' id='psw1'><small>La password deve contenere almeno 6 caratteri</small></li>
                    <li class='text-sm-left' id='psw2'><small>La password deve contenere almeno un numero</small></li>
                    <li class='text-sm-left' id='psw3'><small>La vecchia e la nuova password devono coincidere</small></li>
                </ul>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check-mostra-psw" onclick="mostraPassword()">
                <label for="check-mostra-psw" class="form-check-label user-select-none">Mostra password</label>
            </div>
            <?php
                if (isset($_GET['errore']) && $_GET['errore'] == 1) {
                    echo "<h3 align='center'>Email già utilizzata.</h3>";
                } elseif (isset($_GET['errore']) && $_GET['errore'] == 2) {
                    echo "<h3 align='center'>Vecchia password errata.</h3>";
                }
            ?>
            <div class="mt-2" align='center'>
                <button type="button" id='button-submit' onclick="inviaForm()" class="btn btn-primary">Modifica account</button>
            </div>
        </form>
        <div class="mt-2" align='center'>
            <button onclick="window.location.href='menuPrincipale.php'" class="btn btn-primary">Torna indietro</button>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>