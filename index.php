<?php
$start = microtime(true);
require_once './components/FixedByteNotation.php';
require_once './components/GoogleAuthenticator.php';
require 'vendor/autoload.php';

define('_JEXEC', 1);
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);
mb_internal_encoding("UTF-8");

define('ROOT', dirname(__FILE__));
session_start();

$GLOBALS['DBH'] = Db::getConnection();
$router = new Router();
$router->run();
$end = microtime(true) - $start;
//echo 'Страница сгенерирована за ', $end;