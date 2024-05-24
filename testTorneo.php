<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'Juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$torneo = new Torneo(100000);
// public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$cantidad_infracciones)
$partidoBasquet1= new PartidoBasquetbol(11,"2024-05-05", $objE7, 80, $objE8, 120, 7 );
$partidoBasquet2; new PartidoBasquetbol(12, "2024-05-06", $objE9, 81, $objE10,110,8);
$partidoBasquet3 = new PartidoBasquetbol(13, "2024-05-07", $objE11, 115, $objE12,85,9);
$partidoFutbol1= new PartidoFutbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$partidoFutbol2= new PartidoFutbol(15, "2024-05-08", $objE3,0, $objE4,1);
$partidoFutbol3= new PartidoFutbol(16, "2024-05-09", $objE5, 2, $objE6,3);
$partido1 = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'futbol');
echo "NUEVO PARTIDO: ". "\n" . $partido1;
$cantidadEquipos= count($torneo->getColPartidos())*2;
echo "Cantidad de Equipos en el Torneo: " . $cantidadEquipos . "\n";
$partido2 = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ;
echo "NUEVO PARTIDO: ". "\n" . $partido2;
$cantidadEquipos= count($torneo->getColPartidos())*2;
echo "Cantidad de Equipos en el Torneo: " . $cantidadEquipos . "\n";
$partido3 = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
echo "NUEVO PARTIDO: ". "\n" . $partido2;
$cantidadEquipos= count($torneo->getColPartidos())*2;
echo "Cantidad de Equipos en el Torneo: " . $cantidadEquipos . "\n";
$ganadoresBasquet = $torneo->darGanadores('basquetbol');
echo "Ganadores de basquet: " . "\n";
foreach($ganadoresBasquet as $equipoGanador){
    echo $equipoGanador-getNombre() ."\n";
    echo $equipoGanador->getCapitan()."\n";
    echo $equipoGanador->getCantJugadores()."\n";
    echo $equipoGanador->getObjCategoria()."\n";
}
print_r($ganadoresBasquet);
$ganadoresFutbol = $torneo->darGanadores('futbol');
echo "Ganadores de futbol: " . "\n";
foreach($ganadoresFutbol as $equipo){
    echo $equipo;
}
$premioPartido1 = $torneo->calcularPremioPartido($partido1);
echo "Resultado del primer partido:\n";
echo "Equipo ganador: " . $premioPartido1['equipoGanador']->getNombre() . "\n";
echo "Premio del partido: " . $premioPartido1['premioPartido'] . "\n";
$premioPartido2 = $torneo->calcularPremioPartido($partido2);
echo "Resultado del segundo partido:\n";
echo "Equipo ganador: " . $premioPartido2['equipoGanador']->getNombre() . "\n";
echo "Premio del partido: " . $premioPartido2['premioPartido'] . "\n";
$premioPartido3 = $torneo->calcularPremioPartido($partido3);
echo "Resultado del tercer partido:\n";
echo "Equipo ganador: " . $premioPartido3['equipoGanador']->getNombre() . "\n";
echo "Premio del partido: " . $premioPartido3['premioPartido'] . "\n";
?>
