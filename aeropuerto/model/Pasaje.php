<?php

class Pasaje {
   private $idPasaje;
   private $idCliente;
   private $idVuelo;
   private $clase;
   private $costo;
   
   function __construct($idPasaje, $idCliente, $idVuelo, $costo, $clase) {
       $this->idPasaje = $idPasaje;
       $this->idCliente = $idCliente;
       $this->idVuelo = $idVuelo;
       $this->costo = $costo;
       $this->clase = $clase;
       
   }

   public function getIdPasaje() {
       return $this->idPasaje;
   }

   public function getIdCliente() {
       return $this->idCliente;
   }

   public function getIdVuelo() {
       return $this->idVuelo;
   }

   public function getClase() {
       return $this->clase;
   }

   public function getCosto() {
       return $this->costo;
   }

   public function setIdPasaje($idPasaje) {
       $this->idPasaje = $idPasaje;
   }

   public function setIdCliente($idCliente) {
       $this->idCliente = $idCliente;
   }

   public function setIdVuelo($idVuelo) {
       $this->idVuelo = $idVuelo;
   }

   public function setClase($clase) {
       $this->clase = $clase;
   }

   public function setCosto($costo) {
       $this->costo = $costo;
   }


}
