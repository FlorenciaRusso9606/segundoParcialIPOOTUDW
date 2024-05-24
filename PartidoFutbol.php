<?php

class PartidoFutbol extends Partido{
    private $coef_Menores;
    private $coef_Juveniles;
    private $coef_Mayores;
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coef_Menores =0.13;
        $this->coef_Juveniles =0.19;
        $this->coef_Mayores =0.27;
    }
    public function getCoefMenores() {
        return $this->coef_Menores;
    }

    public function setCoefMenores($coefMenores) {
        $this->coef_Menores = $coefMenores;
    }

    public function getCoefJuveniles() {
        return $this->coef_Juveniles;
    }

    public function setCoefJuveniles($coefJuveniles) {
        $this->coef_Juveniles = $coefJuveniles;
    }

    public function getCoefMayores() {
        return $this->coef_Mayores;
    }

    public function setCoefMayores($coefMayores) {
        $this->coef_Mayores = $coefMayores;
    }
    public function calcularCoeficiente() {

        $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();
        $coefBase=0;
        if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == $this->getObjEquipo2()->getObjCategoria()->getDescripcion()){
            if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == 'Menores'){
                $coefBase= $this->getCoefMenores()*$cantGoles*$cantJugadores;
            } elseif($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == 'Juveniles'){
                $coefBase= $this->getCoefJuveniles()*$cantGoles*$cantJugadores;
            }else{
                $coefBase= $this->getCoefMayores()*$cantGoles*$cantJugadores;
            }
        }
       
        return $coefBase;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena;
    }
}