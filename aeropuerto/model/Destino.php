<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Destino
 *
 * @author David
 */
class Destino {
   private $idDestino;
   private $idPais;
   
   function __construct($idDestino, $idPais) {
       $this->idDestino = $idDestino;
       $this->idPais = $idPais;
   }

   public function getIdDestino() {
       return $this->idDestino;
   }

   public function getIdPais() {
       return $this->idPais;
   }

   public function setIdDestino($idDestino) {
       $this->idDestino = $idDestino;
   }

   public function setIdPais($idPais) {
       $this->idPais = $idPais;
   }


}
