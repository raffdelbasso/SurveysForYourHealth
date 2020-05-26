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

        public static function numeroFigli($idUtente) {
            return "CALL numeroFigli($idUtente)";
        }

        public static function registraFiglio($cognome, $nome, $dataNascita, $codUtente) {
            return "CALL registraFiglio('$cognome', '$nome', '$dataNascita', $codUtente)";
        }

        public static function modificaUtente($idUtente, $cognome, $nome, $email, $nuovaPassword, $codPediatra) {
            return "CALL modificaUtente($idUtente, '$cognome', '$nome', '$email', '$nuovaPassword', $codPediatra)";
        }

        public static function verificaPassword($idUtente, $password) {
            return "CALL verificaPassword($idUtente, '$password')";
        }
    }
?>