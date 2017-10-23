<?php

class Vuelo {
 private $idVuelo;
 private $idcompania;
 private $idPais;
 private $fecha;
 private $capaciidad;
 private $numVuelo;
 function __construct($idVuelo, $idcompania, $idPais, $fecha, $capaciidad, $numVuelo) {
     $this->idVuelo = $idVuelo;
     $this->idcompania = $idcompania;
     $this->idPais = $idPais;
     $this->fecha = $fecha;
     $this->capaciidad = $capaciidad;
     $this->numVuelo = $numVuelo;
 }

 public function getFecha() {
     return $this->fecha;
 }

 public function setFecha($fecha) {
     $this->fecha = $fecha;
 }

 
 
 public function getIdPais() {
     return $this->idPais;
 }

 public function setIdPais($idPais) {
     $this->idPais = $idPais;
 }

  public function getIdVuelo() {
     return $this->idVuelo;
 }

 public function getIdcompania() {
     return $this->idcompania;
 }

 public function getCapaciidad() {
     return $this->capaciidad;
 }

 public function getNumVuelo() {
     return $this->numVuelo;
 }

 public function setIdVuelo($idVuelo) {
     $this->idVuelo = $idVuelo;
 }

 public function setIdcompania($idcompania) {
     $this->idcompania = $idcompania;
 }

 public function setCapaciidad($capaciidad) {
     $this->capaciidad = $capaciidad;
 }

 public function setNumVuelo($numVuelo) {
     $this->numVuelo = $numVuelo;
 }


}
