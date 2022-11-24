<?php

require_once '../../db/db.php';
require_once("../../models/medica_model.php"); //aqui estan todas las clases

$per=new Medica_model();
$datos=array($_POST['medicamento'],$_POST['indicacion']);
$per->saveMedica($datos);
return 1;

//fecha,servicio,expediente,medicamento,recetada,surtida

?>
