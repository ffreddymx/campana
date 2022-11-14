<?php

require_once '../../db/db.php';
require_once("../../models/cotizar_model.php"); //aqui estan todas las clases

$per=new Cotizar_model();
$fecha = date('Y-d-m');
$datos=array($_POST['cliente'],$_POST['telefono'],$_POST['movil'],$_POST['email'],$_POST['municipio'],$_POST['colonia'],$_POST['calle'],$_POST['numero'],$_POST['cp'],$_POST['servicio'],$fecha);
$per->saveCotizar($datos);
return 1;

//cliente 	telefono 	email 	fecha 	servicio 	direccion 		
?>
