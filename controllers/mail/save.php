<?php

require_once '../../db/db.php';
require_once("../../models/correo_model.php"); //aqui estan todas las clases

$per=new Correo_model();
$datos=array($_POST['correo'],$_POST['asunto']);
$per->saveCorreo($datos);
return 1;

//Descripcion VUnitario	Cantidad IVA Tipo Base Tasa	idemisor 	
?>
