<?php

class DispositivosController extends Controller {

  public $model = 'dispositivo';

  public function index($success = '') {

    $dispositivo = new Dispositivo();
    $dispositivos = $dispositivo->all();
    include('app/views/dispositivos/index.php');
  }

  public function cadastrar() {


    if(!empty($_POST)) {
      $row = array(
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : '',
        'ip' => isset($_POST['ip']) ? $_POST['ip'] : '',
        'tipo' => isset($_POST['tipo']) ? $_POST['tipo'] : '',
        'fabricante' => isset($_POST['fabricante']) ? $_POST['fabricante'] : ''
      );

      $dispositivo = new Dispositivo();
      if($dispositivo->create($row)) {
        $success = 'Registro inserido com sucesso.';
        $this->index($success);
        exit;
      } else {
        $error = implode('<br/>', $dispositivo->errors);
      }
    }

    include('app/views/dispositivos/cadastrar.php');
  }

  public function editar($params) {

    $id = current($params);
    $dispositivo = new Dispositivo();

    if(!empty($_POST)) {
      $row = array(
        'nome' => isset($_POST['nome']) ? $_POST['nome'] : '',
        'ip' => isset($_POST['ip']) ? $_POST['ip'] : '',
        'tipo' => isset($_POST['tipo']) ? $_POST['tipo'] : '',
        'fabricante' => isset($_POST['fabricante']) ? $_POST['fabricante'] : ''
      );

      if($dispositivo->update($id, $row)) {
        $success = 'Registro alterado com sucesso.';
        $this->index($success);
        exit;
      } else {
        $error = implode('<br/>', $dispositivo->errors);
      }
    }

    $row = $dispositivo->find($id);
    include('app/views/dispositivos/editar.php');
  }

  public function excluir($params) {

    $id = current($params);
    $dispositivo = new Dispositivo();
    $dispositivo->delete($id);

    $success = 'Registro excluído com sucesso.';
    $this->index($success);
    exit;
  }
}
