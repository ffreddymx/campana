<?php

require_once '../../db/db.php';
require_once("../../models/expediente_model.php"); //aqui estan todas las clases

$per=new Expediente_model();
$datos=array($_POST['fecha'],$_POST['medico'],$_POST['paciente'],$_POST['expediente']);
$per->saveExpediente($datos);
return 1;

//fecha,servicio,expediente,medicamento,recetada,surtida

?>
