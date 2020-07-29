<?php
    spl_autoload_register(function ($class) {
        require_once '../Business/' . $class . '.class.php';
    });
    session_start();
    if (!isset($_SESSION['utenteConnesso'])) {
        header("Location: index.php");
    } else {
        $utente = unserialize($_SESSION["utenteConnesso"]);
        $questionario = unserialize($_SESSION['questionarioScelto']);
    }
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

    switch($questionario->getIdQuestionario()) {
    case '1':
        if ($gestoreUtente->calcolaPunteggioCriticoMCHAT($codFiglio, $dataOra) > 1 ) {
            header("Location: formRisultato.php?msg=1");
        } else {
            if ($gestoreUtente->calcolaPunteggioTotaleMCHAT($codFiglio, $dataOra) > 2) {
                header("Location: formRisultato.php?msg=1");
            } else {
                header("Location: formRisultato.php?msg=0");
            }
        }
        break;
    case 2:
        if ($gestoreUtente->calcolaPunteggioAbusoMinori($codFiglio, $dataOra) > 0) {
            header("Location: formRisultato.php?msg=1");
        } else {
            header("Location: formRisultato.php?msg=0");
        }
    }
    
?>