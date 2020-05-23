<?php
     class DBQuery{
        private function __construct(){
            
        }
        
        public static function effettuaLogin($email, $password) {
            return "CALL effettuaLogin('$email', '$password')";
        }

        public static function cercaUtentePerEmail($email) {
            return "CALL cercaUtentePerEmail('$email')";
        }

        public static function registraUtente($cognome, $nome, $email, $password, $tipoUtente, $codPediatra) {
            return "CALL registraUtente('$cognome', '$nome', '$email', '$password', '$tipoUtente', $codPediatra)";
        }

        public static function mostraPediatri() {
            return "CALL mostraPediatri()";
        }
    }
?>