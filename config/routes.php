<?php

require_once('app/controllers/controller.php');
require_once('app/models/model.php');

function call($controller, $action) {

  require_once('app/controllers/' . $controller . '_controller.php');

  switch($controller) {
    default:
      $controller = new DefaultController();
    break;
  }

  if(method_exists($controller, $action)) {
    $controller->_before();
    $controller->{$action}();
    $controller->_after();
  }
}

$controllers = array('default' => ['index']);

if (array_key_exists($controller, $controllers) &&
    in_array($action, $controllers[$controller])) {
    call($controller, $action);
} else {
  call('default', 'error');
}
