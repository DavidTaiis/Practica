<?php
class Cliente {
private $idCliente;
private $nombreCli;
private $edadCli;
private $generoCli;
private $cedula;

function __construct($idCliente, $nombreCli, $edadCli, $generoCli, $cedula) {
    $this->idCliente = $idCliente;
    $this->nombreCli = $nombreCli;
    $this->edadCli = $edadCli;
    $this->generoCli = $generoCli;
    $this->cedula = $cedula;
}

public function getEdadCli() {
    return $this->edadCli;
}

public function setEdadCli($edadCli) {
    $this->edadCli = $edadCli;
}

public function getIdCliente() {
    return $this->idCliente;
}


public function getNombreCli() {
    return $this->nombreCli;
}

public function getGeneroCli() {
    return $this->generoCli;
}

public function getCedula() {
    return $this->cedula;
}

public function setIdCliente($idCliente) {
    $this->idCliente = $idCliente;
}



public function setNombreCli($nombreCli) {
    $this->nombreCli = $nombreCli;
}

public function setGeneroCli($generoCli) {
    $this->generoCli = $generoCli;
}

public function setCedula($cedula) {
    $this->cedula = $cedula;
}



}
