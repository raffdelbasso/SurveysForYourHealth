<?php
    require_once '../include/config.php';
    
    class DBHandler{
        private static $handler;
        
        private function __construct(){
            
        }
        
        /*   Il costruttore della classe DBHandler � privato e quindi non pu� essere istanziata
         *   Tutti i metodi sono statici
         */
        
        /*   Restituisce il gestore d'accesso al DB  (un oggetto di connessione al DB)
         *   Verr� usato per le operazioni sul DB
         */
        private static  function getHandler(){
            if(!isset(self::$handler)){
                try{
                    /*    PHP PDO � un database abstraction layer che permette l'accesso da diverse sorgenti dati (DBMS)
                     *    Non rende quindi necessario cambiare il codice PHP se si deve lavorare con DBMS diversi da MySQL
                     *    (Se si scrive codice SQL, attenzione ai diversi dialetti; possibile soluzione: le Stored Procedures)
                     *    
                     *    I parametri del costruttore di PDO sono definiti nel file config.php
                     *    Una connessione persistente al DB migliora l'efficienza senza la necessit� di aprire e chiudere la connessione
                     *    per ogni richiesta
                     */
                    self::$handler = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT=>DB_PERSISTENCY));
                }catch(PDOException $e){
                    self::close();
                }
            }
            return self::$handler;
        }
        
        public static function close(){
            self::$handler=null;
        }
        
        /*   PDO fornisce i seguenti metodi per eseguire query:
         *   execute() per eseguire una INSERT, UPDATE, DELETE o SELECT
         *   fetch()  per prelevare un unico record dal resultset di una query
         *   fetchAll() per prelevare l'intero recordset dal resultset di una query 
         *   prepare() prepara una query perch� possa essere eseguita
         */
        
        /*
         *   Realizziamo dei metodi wrapper per semplificare le chiamate 
         *   dalle classi del livello di Business
         */
        
        /*   Metodo wrapper per query di tipo INSERT, UPDATE e DELETE
         */
        public static function executeQuery($sql){
            try{
               $dbHandler = self::getHandler();
               $queryHandler = $dbHandler->prepare($sql);
               $queryHandler->execute();
            }catch(PDOException $e){
               self::close();
            }
        }
        
        /*   Metodo wrapper per query di tipo SELECT che restituisce un recordset
        */
        public static function getAll($sql){
            $recordset=null;
            try{
                $dbHandler = self::getHandler();
                $queryHandler = $dbHandler->prepare($sql);
                $queryHandler->execute();
                $recordset = $queryHandler->fetchAll();
            }catch(PDOException $e){
                self::close();
            }
            return $recordset;
        }
        
        /*   Metodo wrapper per query di tipo SELECT che restituisce un unico record
        */
        public static function getRow($sql){
            $record = null;
            try{
                $dbHandler = self::getHandler();
                $queryHandler = $dbHandler->prepare($sql);
                $queryHandler->execute();
                $record = $queryHandler->fetch();
            }catch(PDOException $e){
                self::close();
            }
            return $record;
        }
        
        /*   Metodo wrapper per query di tipo SELECT che restituisce un valore
        */
        public static function getValue($sql){
            $record = null;
            $value=null;
            try{
                $dbHandler = self::getHandler();
                $queryHandler = $dbHandler->prepare($sql);
                $queryHandler->execute();
                $record = $queryHandler->fetch();
                $value=$record[0];
            }catch(PDOException $e){
                self::close();
            }
            return $value;
        }
        
    }
?>