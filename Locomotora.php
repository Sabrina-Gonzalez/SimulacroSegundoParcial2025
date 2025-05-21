<?php
class Locomotora{
    private $pesoLocomotora;
    private $velocidadMaxima;

    //Constructor
    public function __construct($pesoLocomotora,$velocidadMaxima)
    {
        $this->pesoLocomotora=$pesoLocomotora;
        $this->velocidadMaxima=$velocidadMaxima;
    }

    //Getters
    public function getPesoLocomotora(){
        return $this->pesoLocomotora;
    }
    public function getVelocidadMaxima(){
        return $this->velocidadMaxima;
    }
    //Setters
    public function setPesoLocomotora($pesoLocomotora){
        $this->pesoLocomotora=$pesoLocomotora;
    }
    public function setVelocidadMaxima($velocidadMaxima){
        $this->velocidadMaxima=$velocidadMaxima;
    }

    //toString
    public function __toString()
    {
        return "Peso de la Locomotora: ".$this->getPesoLocomotora()."KG\n".
        "Velocidad Maxima de la Locomotora: ".$this->getVelocidadMaxima()."Km/h\n";
    }
}