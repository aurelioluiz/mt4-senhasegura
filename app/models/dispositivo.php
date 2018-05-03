<?php

class Dispositivo extends Model {

  public $errors = array();

  public function all() {

    $query = $this->db->query('SELECT * FROM dispositivos ORDER BY nome ASC');
    return $query->fetchAll();
  }

  public function find($id) {

    $id = intval($id);
    $query = $this->db->prepare('SELECT * FROM dispositivos WHERE id = :id');
    $query->execute(array('id' => $id));
    return $query->fetch();
  }

  public function create($row) {

    if($this->validate($row)) {

      $query = $this->db->prepare('INSERT INTO dispositivos (nome, ip, tipo, fabricante) VALUES(:nome, :ip, :tipo, :fabricante)');
      $query->execute(array(
        'nome' => $row['nome'],
        'ip' => $row['ip'],
        'tipo' => $row['tipo'],
        'fabricante' => $row['fabricante']
      ));
      return $this->db->lastInsertId();
    } else {
      return false;
    }
  }

  public function update($id, $row) {

    $id = intval($id);
    if($this->validate($row)) {

      $query = $this->db->prepare('UPDATE dispositivos SET nome = :nome, ip = :ip, tipo = :tipo, fabricante = :fabricante WHERE id = :id');
      $query->execute(array(
        'id' => $id,
        'nome' => $row['nome'],
        'ip' => $row['ip'],
        'tipo' => $row['tipo'],
        'fabricante' => $row['fabricante']
      ));
      return true;
    } else {
      return false;
    }
  }

  public function delete($id) {

    $id = intval($id);
    $query = $this->db->prepare('DELETE FROM dispositivos WHERE id = :id');
    $query->execute(array('id' => $id));
  }

  protected function validate($row) {

    $this->errors = array();

    if(empty($row['nome']))
      $this->errors[] = 'O campo <b>nome</b> é obrigatório.';

    return empty($this->errors);
  }
}
