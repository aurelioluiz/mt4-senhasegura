<?php

class Controller {

  public function __construct() {
  }

  public function _before() {
    require_once('app/views/header.php');
  }

  public function _after() {
    require_once('app/views/footer.php');
  }

}
