<?php

class SshController extends Controller {

  public $model = 'dispositivo';
  public $error = array();

  public function __construct() {
    set_error_handler(array($this, '_handler'));
  }

  public function index() {

    $ip = !empty($_POST['dispositivo']) ? $_POST['dispositivo'] : '';
    $porta = !empty($_POST['porta']) ? $_POST['porta'] : 22;
    $usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : '';
    $senha = !empty($_POST['senha']) ? $_POST['senha'] : '';
    $comando = !empty($_POST['comando']) ? $_POST['comando'] : '';

    if(!empty($_POST)) {

      $ssh = ssh2_connect($ip, $porta);
      if($ssh) {
        $auth = ssh2_auth_password($ssh, $usuario, $senha);
        if ($auth) {
          $success = 'Conexão realizada com sucesso. Aguardando comandos...';

          $stream = ssh2_exec($ssh, $comando);
          if ($stream) {
            stream_set_blocking($stream, true);
            $resposta = '';
            while ($buffer = fread($stream,4096))
              $resposta .= $buffer;
            fclose($stream);
          } else {
            $error = 'Falha ao executar o comando.';
          }
        } else {
          $error = 'Falha na autenticação.';
        }
      } else {
        if(empty($this->error))
          $error = 'Falha na conexão.';
        else
          $error = implode('<br/>', $this->error);
      }

      ssh2_disconnect($ssh);
    }

    $dispositivo = new Dispositivo();
    $dispositivos = $dispositivo->all();
    include('app/views/ssh/index.php');
  }

  protected function _handler($c, $m) {
    $this->error[] = $m;
  }
}
