<?php

class HashController extends Controller {

  protected $salt;

  public function __construct() {
    $this->salt = '4544619515aebdad2defb3';
  }

  public function index() {

    $texto = !empty($_POST['texto']) ? $_POST['texto'] : '';

    if(!empty($texto)) {
      $hash = hash('sha512', $texto);
      $hmac = hash_hmac('tiger192,4', $texto, $this->salt);
    }

    include('app/views/hash/index.php');
  }
}
