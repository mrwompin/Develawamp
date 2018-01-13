<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__))); //uses two dirname method calls to get root folder and store it in 'ROOT' 

$url = $_GET['url'] 

require_once (ROOT . DS . 'lib' . DS . 'bootstrap.php');
