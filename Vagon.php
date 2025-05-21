<?php
class Vagon{
    private $anioDeInstalacion;
    private $largoVagon; 
    private $anchoVagon;
    private $pesoDelVagonVacio;
    private $pesoVagon;

    //Constructor
    public function __construct($anioDeInstalacion,$largoVagon,$anchoVagon,$pesoDelVagonVacio)
    {
        $this->anioDeInstalacion=$anioDeInstalacion;
        $this->largoVagon=$largoVagon;
        $this->anchoVagon=$anchoVagon;
        $this->pesoDelVagonVacio=$pesoDelVagonVacio;
        $this->pesoVagon=$pesoDelVagonVacio;
    }

    //Getters
    public function getAnioInstalacion(){
        return $this->anioDeInstalacion;
    }
    public function getLargoVagon(){
        return $this->largoVagon;
    }
    public function getAnchoVagon(){
        return $this->anchoVagon;
    }
    public function getPesoVagonVacio(){
        return $this->pesoDelVagonVacio;
    }
    public function getPesoVagon(){
        return $this->pesoVagon;
    }

    //Setters
    public function setAnioInstalacion($anioDeInstalacion){
        $this->anioDeInstalacion=$anioDeInstalacion;
    }
    public function setLargoVagon($largoVagon){
        $this->largoVagon=$largoVagon;
    }
    public function setAnchoVagon($anchoVagon){
        $this->anchoVagon=$anchoVagon;
    }
    public function setPesoVagonVacio($pesoDelVagonVacio){
        $this->pesoDelVagonVacio=$pesoDelVagonVacio;
    }
    public function setPesoVagon(){
        $this->pesoVagon;
    }

    //toString
    public function __toString()
    {
        return "Año de Instalacion del Vagon: ".$this->getAnioInstalacion().
        "\nLargo del Vagon: ".$this->getLargoVagon().
        "\nAncho del Vagon: ".$this->getAnchoVagon().
        "\nPeso del Vagon Vacio: ".$this->getPesoVagonVacio()."KG".
        "\nPeso del Vagon: ".$this->getPesoVagon()."KG\n";
    }

    /**Implementar el método calcularPesoVagon y redefinirlo según sea necesario. 
    No olvidar agregar el peso que tiene el vagón vacío. */
    public function calcularPesoVagon(){
        return $this->getPesoVagonVacio();
    }    
}
