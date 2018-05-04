<?php

class CriptografiaController extends Controller {

  protected $pos;
  protected $salt;
  protected $cipher;
  protected $iv;

  public function __construct() {
    $this->pos = 18;
    $this->salt = '4544619515aebdad2defb3';
    $this->cipher = 'aes-256-cbc';
    $this->iv = substr(strrev($this->salt), 0, 16);
  }

  public function index() {

    $texto_d = !empty($_POST['texto_d']) ? $_POST['texto_d'] : '';
    $texto_c = !empty($_POST['texto_c']) ? $_POST['texto_c'] : '';

    if(!empty($_POST)) {

      if(!empty($texto_d)) { // Criptografar
        $cripto = $this->_cesar($texto_d);
        $cripto = $this->_aes256($cripto);
      }
      if(!empty($texto_c)) { // Descriptografar
        $decripto = $this->_de_aes256($texto_c);
        $decripto = $this->_de_cesar($decripto);
      }
    }

    include('app/views/criptografia/index.php');
  }

  protected function _cesar($text) {

    $_text = array();

    if(!empty($text)) {
      for($i=0; $i < strlen($text); $i++) {
        $j = ord($text[$i]);
        $k = ($j + $this->pos) % 256;
        if($k >= 0 && $k < 32)
          $k += 32;
        $_text[$i] = chr($k);
      }
    }

    return implode('', $_text);
  }

  protected function _de_cesar($text) {

    $_text = array();

    if(!empty($text)) {
      for($i=0; $i < strlen($text); $i++) {
        $j = ord($text[$i]);
        $k = $j - $this->pos;
        if($k >= 0 && $k < 32)
          $k -= 32;
        if($k < 0)
          $k += 256;
        $_text[$i] = chr($k);
      }
    }

    return implode('', $_text);
  }

  protected function _aes256($text) {

    return base64_encode(openssl_encrypt($text, $this->cipher, $this->salt, null, $this->iv));
  }

  protected function _de_aes256($text) {

    return openssl_decrypt(base64_decode($text), $this->cipher, $this->salt, null, $this->iv);
  }
}
