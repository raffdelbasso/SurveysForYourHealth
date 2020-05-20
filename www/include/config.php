<?php
    define('SITE_ROOT', dirname(dirname(__FILE__)));
    define('PRESENTATION_DIR', SITE_ROOT.'/Presentation/');
    define('BUSINESS_DIR', SITE_ROOT.'/Business/');
    define('DATA_DIR', SITE_ROOT.'/Data/');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','dbpsicologhe');
    define('DB_PERSISTENCY', 'true');
    define('PDO_DSN','mysql:host='.DB_SERVER.'; dbname='.DB_DATABASE);
?>