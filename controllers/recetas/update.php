<?php

require_once '../../db/db.php';
require_once("../../models/recetas_model.php"); //aqui estan todas las clases

$per=new Recetas_model();
$datos=array($_POST['fecha'],$_POST['servicio'],$_POST['expediente'],$_POST['recetada'],$_POST['surtida'],$_POST['ID']);
$per->updateRecetas($datos);
return 1;

?>