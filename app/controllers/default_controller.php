<?php

class DefaultController extends Controller {

  public function index() {
    include('app/views/default.php');
  }

  public function error() {
    include('app/views/error.php');
  }
}
