<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pais
 *
 * @author David
 */
class Pais {
  private $idPais;
  private $pais;
  
  function __construct($idPais, $pais) {
      $this->idPais = $idPais;
      $this->pais = $pais;
  }

  public function getIdPais() {
      return $this->idPais;
  }

  public function getPais() {
      return $this->pais;
  }

  public function setIdPais($idPais) {
      $this->idPais = $idPais;
  }

  public function setPais($pais) {
      $this->pais = $pais;
  }


}
