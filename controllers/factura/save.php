<?php

require_once '../../db/db.php';
require_once("../../models/factura_model.php"); //aqui estan todas las clases

$per=new Factura_model();

$datos=array($_POST['factura'],$_POST['moneda'],$_POST['pago'],$_POST['metodo'],$_POST['fecha']);
$per->saveFactura($datos);
return 1;

//cliente 	telefono 	email 	fecha 	servicio 	direccion 		
?>
