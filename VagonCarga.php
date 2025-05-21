<?php 
class VagonCarga extends Vagon{
    private $pesoMaximoCarga;
    private $pesoCargaTransportada;

    //Constructor
    public function __construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio,$pesoMaximoCarga)
    {
        parent::__construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio);
        $this->pesoMaximoCarga=$pesoMaximoCarga;
        $this->pesoCargaTransportada=0;
    }

    //Getters
    public function getPesoMaximoCarga(){
        return $this->pesoMaximoCarga;
    }
    public function getPesoCargaTransportada(){
        return $this->pesoCargaTransportada;
    }

    //Setters
    public function setPesoMaximoCarga($pesoMaximoCarga){
        $this->pesoMaximoCarga=$pesoMaximoCarga;
    }
    public function setPesoCargaTransportada($pesoCargaTransportada){
        $this->pesoCargaTransportada=$pesoCargaTransportada;
    }

    //toString
    public function __toString()
    {
        return parent::__toString().
        "Peso Maximo de Carga: ".$this->getPesoMaximoCarga()."KG\n".
        "Peso de Carga Transportada: ".$this->getPesoCargaTransportada()."KG\n";
    } 

    /**Peso del Vagón de Carga va a depender del peso de su carga más un índice que coincide con un 20 % del
    peso de la carga, dicho índice se guarda en cada vagón de carga. */
    public function calcularPesoVagon(){
        $pesoCargaTransportada=$this->getPesoCargaTransportada();
        $pesoVagonVacio=parent::calcularPesoVagon();
        $pesoMaximoCarga=$this->getPesoMaximoCarga();

        $pesoVagon=null;
        if ($pesoCargaTransportada <= $pesoMaximoCarga) {
            $pesoVagon=$pesoCargaTransportada + ($pesoCargaTransportada * 0.2) + $pesoVagonVacio;
            $this->setPesoVagon($pesoVagon);
        }
        return $pesoVagon;
    }

    /**Recibe por parámetro la cantidad de carga que va
    a transportar el  vagón y tiene la responsabilidad de actualizar las variables instancias que representan
    el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la
    carga al vagón. */
    public function incorporarCargaVagon($pesoCarga){
        $agregado=false;
        $pesoMaximoCarga=$this->getPesoMaximoCarga();
        $pesoCargaActual=$this->getPesoCargaTransportada();

        $pesoNuevo=$pesoCargaActual + $pesoCarga;
        if ($pesoNuevo <= $pesoMaximoCarga) {
            $this->setPesoCargaTransportada($pesoNuevo);
            $this->calcularPesoVagon();
            $agregado=true;
        }
        return $agregado;
    }
}
