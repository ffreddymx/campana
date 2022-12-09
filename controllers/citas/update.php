<?php

require_once '../../db/db.php';
require_once("../../models/citas_model.php"); //aqui estan todas las clases

$per=new Citas_model();
$datos=array($_POST['fecha'],$_POST['hora'],$_POST['paciente'],$_POST['asistio'],$_POST['ID']);
$per->updateCitas($datos);
return 1;

?>