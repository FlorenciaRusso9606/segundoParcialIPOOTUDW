<?php
class Torneo{
    private $colPartidos;
    private $importePremio;

    public function __construct($importePremio)
    {
        $this->colPartidos = [];
        $this->importePremio = $importePremio;
    }
    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function setColPartidos($colPartidos){
        $this->colPartidos= $colPartidos;
    }
    public function getImportePremio() {
        return $this->importePremio;
    }

    public function setImportePremio($importePremio) {
        $this->importePremio = $importePremio;
    }

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $nuevoPartido = null;
        $idPartido = count($this->getColPartidos())+1;
        $cantGolesEquipo1 = 0;
        $cantGolesEquipo2= 0;
        $cantInfracciones = 0;
        $colPartidos = $this->getColPartidos();
        if($OBJEquipo1->getCantJugadores()== $OBJEquipo2->getCantJugadores() &&$OBJEquipo1->getObjCategoria()->getDescripcion() == $OBJEquipo1->getObjCategoria()->getDescripcion()){
            if($tipoPartido == "futbol"){
                $nuevoPartido = new PartidoFutbol($idPartido, $fecha,$OBJEquipo1, $cantGolesEquipo1, $OBJEquipo2, $cantGolesEquipo2);
            }else{
                $nuevoPartido = new PartidoBasquetbol($idPartido, $fecha,$OBJEquipo1, $cantGolesEquipo1, $OBJEquipo2, $cantGolesEquipo2, $cantInfracciones);
            }
        }
        if($nuevoPartido !==null){
            array_push($colPartidos, $nuevoPartido);
            $this->setColPartidos($colPartidos);
        }
        return $nuevoPartido;
    }
    public function darGanadores($deporte){
        $ganadores = [];

        foreach ($this->getColPartidos() as $partido) {
            if ($partido instanceof PartidoFutbol && $deporte == 'futbol' ||
                $partido instanceof PartidoBasquetbol && $deporte == 'basquetbol') {
                $equipoGanador = $partido->darEquipoGanador();
                if (count($equipoGanador) == 1) {
                    $ganadores[] = $equipoGanador;
                } else {
                    // Si hay empate, agregar ambos equipos a la colección de ganadores
                    $ganadores[] = $equipoGanador[0];
                    $ganadores[] = $equipoGanador[1];
                }
            }
        }
        return $ganadores;
    }
    public function calcularPremioPartido($objPartido) {
        $premioPartido = $objPartido->calcularCoeficiente() * $this->getImportePremio();

        $equipoGanador = $objPartido->darEquipoGanador();

        $arreglo=[ "equipoGanador" => $equipoGanador,
            "premioPartido" => $premioPartido
        ];
        return $arreglo;
    }
    private function obtValoresArrays($array){
        $cadena="";
        foreach ($array as $elementoArray) {
            $cadena = $cadena . " " . $elementoArray . "\n";
        }
        return $cadena;
    }
    public function __toString()
    {
        $partidos = $this->obtValoresArrays($this->getColPartidos());
        return "Partidos: " . $partidos . "\n" .
        "Importe Premio: " . $this->getImportePremio();
    }
}
?>