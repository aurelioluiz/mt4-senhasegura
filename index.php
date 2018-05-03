<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('BASE', str_replace('/index.php', '/', $_SERVER['SCRIPT_NAME']));

$controller = 'default';
$action = 'index';
$params = array();

if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
  $uri = explode('/', trim($_SERVER['PATH_INFO'], '/'));
  $controller = isset($uri[0]) ? $uri[0] : $controller;
  $action = isset($uri[1]) ? $uri[1] : $action;

  for ($i=2; $i < count($uri); $i++) {
    $params[] = $uri[$i];
  }
}

require_once('config/connection.php');
require_once('config/routes.php');
