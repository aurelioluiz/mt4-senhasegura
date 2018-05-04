<?php

require_once('app/controllers/controller.php');
require_once('app/models/model.php');

function call($controller, $action, $params = array()) {

  // Controller
  require_once('app/controllers/' . $controller . '_controller.php');
  $cls = ucwords($controller) . 'Controller';

  if(class_exists($cls)) {
    $obj = new $cls;

    // Model
    if(isset($obj->model)) {
      require_once('app/models/' . $obj->model . '.php');
    }

    // Call action
    if(method_exists($obj, $action)) {
      $obj->_before();
      $obj->{$action}($params);
      $obj->_after();
    } else {
      call('default', 'error');
    }
  }
}

$controllers = array(
  'default' => array('index'),
  'dispositivos' => array('index', 'cadastrar', 'editar', 'excluir'),
  'ssh' => array('index'),
  'criptografia' => array('index'),
);

if (array_key_exists($controller, $controllers) &&
    in_array($action, $controllers[$controller])) {
  call($controller, $action, $params);
} else {
  call('default', 'error');
}
