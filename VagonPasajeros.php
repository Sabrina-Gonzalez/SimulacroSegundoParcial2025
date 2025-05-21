<?php
class VagonPasajeros extends Vagon{
    private $cantidadMaximaPasajeros;
    private $cantidadPasajerosAbordo;
    private $pesoPromedioPasajeros;

    //Constructor
    public function __construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio,$cantidadMaximaPasajeros)
    {
        parent::__construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio);
        $this->cantidadMaximaPasajeros=$cantidadMaximaPasajeros;
        $this->cantidadPasajerosAbordo=0;
        $this->pesoPromedioPasajeros=50;
    }

    //Getters
    public function getCantidadMaximaPasajeros(){
        return $this->cantidadMaximaPasajeros;
    }
    public function getCantidadPasajerosAbordo(){
        return $this->cantidadPasajerosAbordo;
    }
    public function getPesoPromedioPasajeros(){
        return $this->pesoPromedioPasajeros;
    }

    //Setters
    public function setCantidadMaximaPasajeros($cantidadMaximaPasajeros){
        $this->cantidadMaximaPasajeros=$cantidadMaximaPasajeros;
    }
    public function setCantidadPasajerosAbordo($cantidadPasajerosAbordo){
        $this->cantidadPasajerosAbordo=$cantidadPasajerosAbordo;
    }
    public function setPesoPromedioPasajeros($pesoPromedioPasajeros){
        $this->pesoPromedioPasajeros=$pesoPromedioPasajeros;
    }

    //toString
    public function __toString()
    {
        return parent::__toString().
        "Cantidad Maxima de Pasajeros: ".$this->getCantidadMaximaPasajeros()."\n".
        "Cantidad de Pasajeros Abordo: ".$this->getCantidadPasajerosAbordo()."\n".
        "Peso Promedio de los Pasajeros: ".$this->getPesoPromedioPasajeros()."KG\n";
    }

    /**Peso del vagón Pasajero se calcula de acuerdo a la
    cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos. */
    public function calcularPesoVagon(){
        $cantidadPasajerosAbordo=$this->getCantidadPasajerosAbordo();
        $pesoPromedioPasajero=$this->getPesoPromedioPasajeros();
        $pesoVagonVacio=parent::calcularPesoVagon();
        $pesoVagon=($cantidadPasajerosAbordo * $pesoPromedioPasajero) + $pesoVagonVacio;
        $this->setPesoVagon($pesoVagon);
        return $pesoVagon;
    }

    /**Recibe por parámetro la cantidad de pasajeros
    que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan  el
    peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no
    agregar los pasajeros al vagón. */
    public function incorporarPasajeroVagon($cantidadPasajeros){
        $agregado=false;
        $cantidadPasajerosAbordo=$this->getCantidadPasajerosAbordo();
        $cantidadMaximaPasajeros=$this->getCantidadMaximaPasajeros();

        $nuevaCantidadPasajeros=$cantidadPasajerosAbordo + $cantidadPasajeros;
        if ($nuevaCantidadPasajeros <= $cantidadMaximaPasajeros) {
            $this->setCantidadPasajerosAbordo($nuevaCantidadPasajeros);
            $this->calcularPesoVagon();
            $agregado=true;
        }
        return $agregado;
    }
}
