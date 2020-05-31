<?php
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
    } else {
        $utente = unserialize($_SESSION["utenteConnesso"]);
    }
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    $codFiglio = $_POST["idFiglio"];
    $i=1;
    while(!isset($_POST['domanda'.$i])) {
        $i++;
    }
    $dataOra = date('Y-m-d H:i:s');
    while (isset($_POST['domanda'.$i])) {
        $gestoreUtente = new GestoreUtente();
        $gestoreUtente->registraRisposta($dataOra, $codFiglio, $_POST['domanda'.$i]);
        $i++;
    }

    if ($gestoreUtente->calcolaPunteggioCritico($codFiglio, $dataOra) > 1 ) {
        header("Location: formRisultato.php?msg=1");
    } else {
        if ($gestoreUtente->calcolaPunteggioTotale($codFiglio, $dataOra) > 2) {
            header("Location: formRisultato.php?msg=1");
        } else {
            header("Location: formRisultato.php?msg=0");
        }
    }
?>