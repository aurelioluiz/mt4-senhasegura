<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$controller = 'default';
$action = 'index';
$params = array();

if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
  $uri = explode('/', trim($_SERVER['PATH_INFO'], '/'));
  $controller = isset($uri[0]) ? $uri[0] : '';
  $action = isset($uri[1]) ? $uri[1] : '';
  for ($i=2; $i <= count($uri); $i++) {
    $params[] = $uri[$i];
  }
}

require_once('config/connection.php');
require_once('config/routes.php');