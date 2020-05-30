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
    $codFiglio = $_GET["idFiglio"];
    $i=1;
    while(!isset($_GET['domanda'.$i])) {
        $i++;
    }
    $dataOra = date('Y-m-d H:i:s');
    while (isset($_GET['domanda'.$i])) {
        $gestoreUtente = new GestoreUtente();
        $gestoreUtente->registraRisposta($dataOra, $codFiglio, $_GET['domanda'.$i]);
        $i++;
    }

    if ($gestoreUtente->calcolaPunteggioCritico($dataOra) > 1 ) {
        echo "AUTISTICO";
    } else {
        if ($gestoreUtente->calcolaPunteggioTotale($dataOra) > 2) {
            echo "AUTISTICO";
        } else {
            echo "NON AUTISTICO";
        }
    }
?>