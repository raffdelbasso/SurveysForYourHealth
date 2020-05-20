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

        public function registraUtente($cognome, $nome, $email, $password, $tipoUtente) {
            $sql = DBQuery::cercaUtentePerEmail($email);
            $utente = DBHandler::getRow($sql);
            if ($utente != null) {
                return 1;
            } else {
                $sql = DBQuery::registraUtente($cognome, $nome, $email, $password, $tipoUtente);
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

    }
?>