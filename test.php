<?php
require_once 'Moto.php';
include_once 'Importada.php';
include_once 'Nacional.php';
include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Venta.php';

// Conocemos que una importante empresa de la región que vende motos, desea implementar una aplicación que le permita gestionar la información de los clientes, de las motos y de las ventas realizadas.
// El equipo de desarrollo que se encuentra realizando la implementación, recibió un nuevo requerimiento vinculado a las motos que van a ser comercializadas. Por un lado va a ser posible vender motos de fabricación nacional y por otro lado, motos importadas desde el exterior. Para el caso de las motos importadas, se debe almacenar  el país desde el que se importa y el  importe correspondiente a los impuestos de importación que la empresa paga por el ingreso al país. Con el objetivo de incentivar el consumo de productos Nacionales, se desea almacenar un porcentaje de descuento en las motos Nacionales que será aplicado al momento de la venta (por defecto el valor del descuento es del 15%).
// 	Sobre la implementación realizada para el primer parcial:

//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2🟢
$objCliente1 = new Cliente("Leoanardo", "Pacheco", true, "Carnet", 41347641);
$objCliente2 = new Cliente("Juani", "Loiacono", true, "Libreta", 1238902);

//2.Cree 4 objetos Motos con la  información visualizada en las siguientes tablas: código, costo, año fabricación, descripción, porcentaje incremento anual, activo entre otros.

$objMoto1 = new Nacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new Nacional(12, 584000, 2021, "Zanella Zr 150 Ohc ", 70, true, 10);
$objMoto3 = new Nacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 0);
$objMoto4 = new Importada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia 🥖", 6244400);
$objMoto5 = new Importada(15, 2500000, 2023, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Inglaterra 👑", 700000);



// 3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].

$arrayMotos = [$objMoto1, $objMoto2, $objMoto3, $objMoto4, $objMoto5];
$arrayClientes = [$objCliente1, $objCliente2];
$arrayVentas = [];
$empresa = new Empresa(" Alta Gama", "Av Argenetina 123", $arrayClientes, $arrayMotos, $arrayVentas);

// 4. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido.
$objCliente = $objCliente2;
$colCodigosMotos = [11, 12, 13, 14, 15];
echo $venta0 = $empresa->registrarVenta($colCodigosMotos, $objCliente);

// 5. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido.
$colCodigosMotos = [13, 14];
$venta1 = $empresa->registrarVenta($colCodigosMotos, $objCliente);

// 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido.
$colCodigosMotos = [14, 2];
$venta2 = $empresa->registrarVenta($colCodigosMotos, $objCliente);
$venta2->incorporarMoto($objMoto1);
// 7. Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
$empresa->informarVentasImportadas();

// 8. Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.
$empresa->informarSumaVentasNacionales();
// 9. Realizar un echo de la variable Empresa creada en 2.
echo $empresa;

// echo $venta0->retornarTotalVentaNacional();
// echo $venta0->retornarMotosImportadas();
