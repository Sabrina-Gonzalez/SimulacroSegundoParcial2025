<?php
include_once 'Vagon.php';
include_once 'VagonPasajeros.php';
include_once 'VagonCarga.php';
include_once 'Locomotora.php';
include_once 'Formacion.php';

//1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.
$objLocomotora= new Locomotora(188000,140);

// 2.Se crea 3 objetos con la  información visualizada en la tabla:
$objVagon1= new VagonPasajeros(2015, 20, 3, 15000,30);
$objVagonCarga= new VagonCarga(2018,20,3,15000,60000);
$objVagon2= new VagonPasajeros(2020,25,4,15000,50);

$objVagon1->incorporarPasajeroVagon(25);
$objVagonCarga->incorporarCargaVagon(55000);
$objVagon2->incorporarPasajeroVagon(50);

//3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método incorporarVagonFormacion.
$objFormacion= new Formacion($objLocomotora,3);
$incorporado=$objFormacion->incorporarVagonFormacion($objVagon1);
$incorporado2=$objFormacion->incorporarVagonFormacion($objVagonCarga);
$incorporado3=$objFormacion->incorporarVagonFormacion($objVagon2);
echo $incorporado ? "Vagon Incorporado.\n" : "Vagon NO Incorporado.\n";
echo $incorporado2 ? "Vagon Incorporado.\n" : "Vagon NO Incorporado.\n";
echo $incorporado3 ? "Vagon Incorporado.\n" : "Vagon NO Incorporado.\n";

//4. Invocar al método  incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y visualizar el resultado.
$incorporado=$objFormacion->incorporarPasajeroFormacion(6);
echo $incorporado ? "Pasajeros Incorporados.\n" : "NO se pudieron Incorporar los pasajeros.\n";

//5. Realizar un print de los 3 objetos vagones creados.
print_r($objFormacion);

//6. Invocar al método  incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y visualizar el resultado.
$incorporarPasajeros=$objFormacion->incorporarPasajeroFormacion(14);
echo $incorporarPasajeros ? "Pasajeros Incorporados."."\n" : "NO se pudieron Incorporar los pasajeros."." \n";

// 7. Realizar un print del objeto locomotora
print_r($objLocomotora);

//8. Invocar al método  promedioPasajeroFormacion y visualizar el resultado obtenido.
$promedio=$objFormacion->promedioPasajeroFormacion();
echo "Promedio Pasajero Formacion: ".$promedio."\n";

//9. Invocar al método  pesoFormacion y visualizar el resultado obtenido.
$pesoFormacion=$objFormacion->pesoFormacion();
echo "Peso Formacion: ".$pesoFormacion." Kg.\n";

//10. Realizar un print de los 3 objetos vagones creados.
print_r($objFormacion);
