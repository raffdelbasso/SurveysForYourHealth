<?php
    require_once '../Data/DBHandler.class.php';
    require_once '../Data/DBQuery.class.php';
    spl_autoload_register(function ($class) {
        require_once  $class . '.class.php';
    });
        
    class GestoreUtente{
        public function __construct() {
            
        }
        
        public function effettuaLogin($email, $password) {
            $sql = DBQuery::effettuaLogin($email, md5($password));
            $utente = DBHandler::getRow($sql);
            if ($utente != null) {
                return new Utente($utente[0], $utente[1], $utente[2], $utente[3], $utente[5]);
            } else {
                return null;
            }
        }

        public function registraUtente($cognome, $nome, $email, $password, $tipoUtente, $codPediatra) {
            $sql = DBQuery::cercaUtentePerEmail($email);
            $utente = DBHandler::getRow($sql);
            if ($utente != null) {
                return 1;
            } else {
                $sql = DBQuery::registraUtente($cognome, $nome, $email, $password, $tipoUtente, $codPediatra);
                DBHandler::executeQuery($sql);
                return 0;
            }
        }

        public function mostraPediatri() {
            $pediatri = array();
            $sql = DBQuery::mostraPediatri();
            $recordSet = DBHandler::getAll($sql);
            for ($i=0; $i<count($recordSet); $i++) {
                array_push($pediatri, new Utente($recordSet[$i][0], $recordSet[$i][1], $recordSet[$i][2], $recordSet[$i][3], $recordSet[$i][5]));
            }
            return $pediatri;
        }
        
        public function numeroFigli($idUtente) {
            $sql = DBQuery::numeroFigli($idUtente);
            $numeroUtenti = DBHandler::getValue($sql);
            return $numeroUtenti;
        }

        public function registraFiglio($cognome, $nome, $dataNascita, $sesso, $codUtente) {
            $sql = DBQuery::registraFiglio($cognome, $nome, $dataNascita, $sesso, $codUtente);
            echo $sql;
            DBHandler::executeQuery($sql);
        }

        public function modificaUtente($idUtente, $cognome, $nome, $email, $vecchiaEmail, $vecchiaPassword, $nuovaPassword, $codPediatra) {
            $sql = DBQuery::verificaPassword($idUtente, $vecchiaPassword);
            $utente = DBHandler::getRow($sql);
            if ($utente != null) {
                $sql = DBQuery::cercaUtentePerEmail($email);
                $utente = DBHandler::getRow($sql);
                if ($utente != null && $email != $vecchiaEmail) {
                    return 1;
                } else {
                    $sql = DBQuery::modificaUtente($idUtente, $cognome, $nome, $email, $nuovaPassword, $codPediatra);
                    DBHandler::executeQuery($sql);
                    return 0;
                }
            } else {
                return 2;
            }
        }

        public function mostraFigli($idUtente) {
            $figli = array();
            $sql = DBQuery::mostraFigli($idUtente);
            $recordSet = DBHandler::getAll($sql);
            for ($i=0; $i<count($recordSet); $i++) {
                array_push($figli, new Figlio($recordSet[$i][0], $recordSet[$i][2], $recordSet[$i][1]));
            }
            return $figli;
        }

        public function registraRisposta($dataOra, $codFiglio, $codOpzioneInDomanda) {
            $sql = DBQuery::registraRisposta($dataOra, $codFiglio, $codOpzioneInDomanda);
            DBHandler::executeQuery($sql);
        }

        public function calcolaPunteggioCriticoMCHAT($codFiglio, $dataOra) {
            $sql = DBQuery::calcolaPunteggioCriticoMCHAT($codFiglio, $dataOra);
            $punteggio = DBHandler::getValue($sql);
            return $punteggio;
        }

        public function calcolaPunteggioTotaleMCHAT($codFiglio, $dataOra) {
            $sql = DBQuery::calcolaPunteggioTotaleMCHAT($codFiglio, $dataOra);
            $punteggio = DBHandler::getValue($sql);
            return $punteggio;
        }

        public function calcolaPunteggioAbusoMinori($codFiglio, $dataOra) {
            $sql = DBQuery::calcolaPunteggioAbusoMinori($codFiglio, $dataOra);
            $punteggio = DBHandler::getValue($sql);
            return $punteggio;
        }
    }
?>