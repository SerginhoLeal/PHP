<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_STRICT);

session_start();

header("Content-Type: text/html; charset=utf8");
// date_default_timezone_set('America/Sao_Paulo');

define('SERVIDOR', 'mysql:host=localhost;dbname=empresa;charset=utf8');
define('USUARIO', 'root');
define('SENHA', '');

// define('ROOT', 'http://localhost/workshop/niveis_de_acesso');
// define('ROOT_PHP', $_SERVER['DOCUMENT_ROOT'].'/workshop/niveis_de_acesso');