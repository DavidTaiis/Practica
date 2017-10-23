<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compania
 *
 * @author David
 */
class Compania {
    private $idCompania;
    private $nombreCompania;
    private $telefono;
    private $mail;
    
    function __construct($idCompania, $nombreCompania, $telefono, $mail) {
        $this->idCompania = $idCompania;
        $this->nombreCompania = $nombreCompania;
        $this->telefono = $telefono;
        $this->mail = $mail;
    }

    public function getIdCompania() {
        return $this->idCompania;
    }

    public function getNombreCompania() {
        return $this->nombreCompania;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setIdCompania($idCompania) {
        $this->idCompania = $idCompania;
    }

    public function setNombreCompania($nombreCompania) {
        $this->nombreCompania = $nombreCompania;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }


}
