<?php
class Formacion{
    private $objLocomotora;
    private $coleccionVagones;
    private $maximoVagonesQueContiene;
    
    //Constructor
    public function __construct($objLocomotora,$maximoVagonesQueContiene)
    {
        $this->objLocomotora=$objLocomotora;
        $this->coleccionVagones=[];
        $this->maximoVagonesQueContiene=$maximoVagonesQueContiene;
    }

    //Getters
    public function getObjLocomotora(){
        return $this->objLocomotora;
    }
    public function getColVagones(){
        return $this->coleccionVagones;
    }
    public function getMaximoVagonesQueContiene(){
        return $this->maximoVagonesQueContiene;
    }

    //Setters
    public function setObjLocomotora($objLocomotora){
        $this->objLocomotora=$objLocomotora;
    }
    public function setColVagones($coleccionVagones){
        $this->coleccionVagones=$coleccionVagones;
    }
    public function setMaximoVagonesQueContiene($maximoVagonesQueContiene){
        $this->maximoVagonesQueContiene=$maximoVagonesQueContiene;
    }

    //toString
    public function __toString()
    {
        $coleccionVagones="Coleccion de Vagones: \n";
        $i=1;
        foreach ($this->getColVagones() as $vagon) {
            $coleccionVagones.="Vagon ".$i++."\n".$vagon."\n";
        }
        return "Locomotora: \n".$this->getObjLocomotora()."\n".
        $coleccionVagones.
        "Maximo de Vagones que Contiene: ".$this->getMaximoVagonesQueContiene()."\n";
    }

    /**Recibe la cantidad de pasajeros que se
    desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
    incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que  pueda ingresar la
    cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
    utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. */
    public function incorporarPasajeroFormacion($cantidadPasajeros){
        $incorporado=false;
        $coleccionVagones=$this->getColVagones();

        $i=0;
        while ($i < count($coleccionVagones) && !$incorporado) {
            if (is_a($coleccionVagones[$i], "VagonPasajeros")) {
                $pasajerosIncorporados=$coleccionVagones[$i]->incorporarPasajeroVagon($cantidadPasajeros);
                if ($pasajerosIncorporados) {
                    $incorporado=true;
                }
            }
            $i++;
        }

        return $incorporado;
    }

    /**Recibe por parámetro un objeto vagón y lo incorpora a la formación. 
    El método retorna verdadero si la incorporación se realizó con éxito y falso en
    caso contrario. */
    public function incorporarVagonFormacion($objVagon){
        $incorporado=false;
        $coleccionVagones=$this->getColVagones();
        $maximoVagones=$this->getMaximoVagonesQueContiene();

        if (count($coleccionVagones) < $maximoVagones) {
            $coleccionVagones[]=$objVagon;
            $this->setColVagones($coleccionVagones);
            $incorporado=true;
        }
        return $incorporado;
    }

    /**Recorre la colección de vagones y retorna un valor que represente 
    el promedio de pasajeros por vagón que se encuentran en la formación. Puede
    utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. */
    public function promedioPasajeroFormacion(){
        $promedio=0;
        $coleccionVagones=$this->getColVagones();
        $cantidadVagonPasajero=0;
        $totalPasajeros=0;
        foreach ($coleccionVagones as $vagon) {
            if (is_a($vagon, "VagonPasajeros")) {
                $cantidadVagonPasajero++;
                $totalPasajeros+=$vagon->getCantidadPasajerosAbordo();
            }
        }
        if ($cantidadVagonPasajero != 0) {
            $promedio=round($totalPasajeros/$cantidadVagonPasajero,2);
        }
        return $promedio;
    }

    /**Retorna el peso de la formación completa. */
    public function pesoFormacion(){
        $pesoObjLocomotora=$this->getObjLocomotora()->getPesoLocomotora();
        $coleccionVagones=$this->getColVagones();
        $peso=0;
        foreach ($coleccionVagones as $vagon) {
            $peso+=$vagon->calcularPesoVagon();
        }
        $pesoFormacionTotal=$peso + $pesoObjLocomotora;
        return $pesoFormacionTotal;
    }

    /**Retorna el primer vagón de la formación que
    aún no se encuentra completo */
    public function retornarVagonSinCompletar(){
        $coleccionVagones=$this->getColVagones();
        $i=0;
        $encontrado=false;
        $vagonIncompleto=null;
        while ($i < count($coleccionVagones) && !$encontrado) {
            if($coleccionVagones[$i] instanceof VagonPasajeros){
                if ($coleccionVagones[$i]->getCantidadPasajerosAbordo() < $coleccionVagones[$i]->getCantidadMaximaPasajeros()) {
                    $vagonIncompleto=$coleccionVagones[$i];
                    $encontrado=true;
                }
            }
            $i++;
        }
        return $vagonIncompleto;
    }
}