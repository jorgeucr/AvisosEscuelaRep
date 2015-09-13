<?php

class Aviso {

    private $id;
    private $user;
    private $fecha;
    private $hora;
    private $categoria;
    private $descripcion;
    private $nombreAviso;

    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        function getUser() {
        return $this->user;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNombreAviso() {
        return $this->nombreAviso;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNombreAviso($nombreAviso) {
        $this->nombreAviso = $nombreAviso;
    }

}
?>

