<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Empresa.php';
include_once 'Venta.php';

$objCliente1= new Cliente("Juan","Perez",true,"DNI","30678345");
$objCliente2= new Cliente("Maria","Fernandez",true,"DNI","25934769");

$objMoto1= new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2= new Moto(12,584000,2021," Zanella Zr 150 Ohc",70,true);
$objMoto3= new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);

$objEmpresa= new Empresa("Alta Gama","Av Argentina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3],[]);


echo "5)_El precio final de las ventas es: $".$objEmpresa->registrarVenta([11,12,13],$objCliente2)."\n";
$registro=$objEmpresa->registrarVenta([0],$objCliente2);
if ($registro==0) {
    echo "6)_No se registraron Ventas."."\n";
}else {
    echo "6)_El precio final de las ventas es: $".$registro;
}
$_registro=$objEmpresa->registrarVenta([2],$objCliente2)."\n";
if ($_registro==0) {
    echo "7)_No se registraron Ventas."."\n";
}else {
    echo "7)_El precio final de las ventas es: $".$registro;
}

$ventas=$objEmpresa->retornarVentasXCliente("DNI","30678345");
if ($ventas==[]) {
    echo "8)_No hay ventas realizadas al cliente\n";
}else {
    echo "8)_Colección con las ventas realizadas al cliente:\n";
    foreach ($ventas as $venta) {
        echo $venta."\n";
    }
}

$_ventas=$objEmpresa->retornarVentasXCliente("DNI","25934769");
if ($_ventas==[]) {
    echo "9)No hay ventas realizadas al cliente\n";
}else {
    echo "9)_Colección con las ventas realizadas al cliente:\n";
    foreach ($_ventas as $venta) {
        echo $venta."\n";
    }
}
echo "10)_\n".$objEmpresa;