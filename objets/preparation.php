<?php
class Preparation {
  public function creationPrep ($data) {
    foreach ($data as $key => $value) {
      $prepare = array();
      foreach ($data as $key => $value) {
        $value = filter($value);
        array_push($prepare, ['prep' => ':'.$key, 'variable' => $value]);
      }
    }
    return $prepare;
  }
  public function creationPrepIdUser ($data) {
    foreach ($data as $key => $value) {
      $prepare = array();
      foreach ($data as $key => $value) {
        $value = filter($value);
        array_push($prepare, ['prep' => ':'.$key, 'variable' => $value]);
      }
    }
    $getIdUser = new Controles();
    $idUser = $getIdUser->idUser($_SESSION);
      array_push($prepare, ['prep' => ':idUser', 'variable' => $idUser]);
      return $prepare;
  }
  public function creationPrepTokenUser ($data) {
    foreach ($data as $key => $value) {
      $prepare = array();
      foreach ($data as $key => $value) {
        $value = filter($value);
        array_push($prepare, ['prep' => ':'.$key, 'variable' => $value]);
      }
    }
      array_push($prepare, ['prep' => ':token', 'variable' => $_SESSION['tokenConnexion']]);
      return $prepare;
  }
}
