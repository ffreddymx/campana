<?php

require_once '../../db/db.php';
require_once("../../models/expediente_model.php"); //aqui estan todas las clases

$per=new Expediente_model();
$datos=array($_POST['fecha'],$_POST['comunidad'],$_POST['medico'],$_POST['paciente'],$_POST['expediente'],$_POST['ID']);
$per->updateExpediente($datos);
return 1;

?>