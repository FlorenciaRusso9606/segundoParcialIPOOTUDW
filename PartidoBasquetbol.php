<?php

class PartidoBasquetbol extends Partido{
    private $coef_penalizacion;
    private $cantidad_infracciones;
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantidad_infracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coef_penalizacion =0.75;
        $this->cantidad_infracciones = $cantidad_infracciones;
    }
    public function getCoefPenalizacion(){
        return $this->coef_penalizacion;
    }
    public function setCoefPenalizacion($coef_penalizacion){
        $this->coef_penalizacion = $coef_penalizacion;
    }
    public function getCantInfracciones(){
        return $this->cantidad_infracciones;
    }
    public function setCantInfracciones($cantidad_infracciones){
        $this->cantidad_infracciones = $cantidad_infracciones;
    }
    public function calcularCoeficiente(){
        $coeficiente_base_partido = parent::calcularCoeficiente();
        $coef_penalización = $this->getCoefPenalizacion();
        $cant_infracciones = $this->getCantInfracciones();
        $coef  = $coeficiente_base_partido  - ($coef_penalización*$cant_infracciones);
        return $coef;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Cantidad de infracciones: " . $this->getCantInfracciones() . "\n";
        return $cadena;
    }
}