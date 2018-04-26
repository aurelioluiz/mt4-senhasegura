<?php

class DefaultController extends Controller {

  public function index() {
    require_once('app/views/default.php');
  }

  public function error() {
    require_once('app/views/error.php');
  }
}
