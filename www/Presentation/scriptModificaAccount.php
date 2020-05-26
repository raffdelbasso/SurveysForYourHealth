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
    $idUtente = $_POST['idUtente'];
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $vecchiaPassword = md5($_POST['vecchiaPassword']);
    $nuovaPassword = md5($_POST['nuovaPassword']);
    if (isset($_POST['codPediatra'])) {
		$codPediatra = $_POST['codPediatra'];
	} else {
		$codPediatra = 'null';
	}
    $gestoreUtente = new GestoreUtente();
    $risultato = $gestoreUtente->modificaUtente($idUtente, $cognome, $nome, $email, $vecchiaPassword, $nuovaPassword, $codPediatra);
    if ($risultato == 0) {
        $_SESSION['utenteConnesso'] = serialize(new Utente($idUtente, $cognome, $nome, $email, $_POST['tipoUtente']));
        header("Location: menuPrincipale.php");
    } elseif ($risultato == 1) {
        header("Location: modificaAccount.php?errore=1");
    } elseif ($risultato == 2) {
        header("Location: modificaAccount.php?errore=2");
    }
?>