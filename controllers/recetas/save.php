<?php

require_once '../../db/db.php';
require_once("../../models/recetas_model.php"); //aqui estan todas las clases

$per=new Recetas_model();
$datos=array($_POST['folio'],$_POST['fecha'],$_POST['servicio'],$_POST['expediente'],$_POST['recetada'],$_POST['surtida']);
$per->saveRecetas($datos);
return 1;

//fecha,servicio,expediente,medicamento,recetada,surtida

?>
