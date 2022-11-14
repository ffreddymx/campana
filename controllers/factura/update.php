<?php

require_once '../../db/db.php';
require_once("../../models/cotizar_model.php"); //aqui estan todas las clases

$per=new Cotizar_model();
$datos=array($_POST['cliente'],$_POST['servicio'],$_POST['costo'],$_POST['ID']);
$per->updateCotizar($datos);
return 1;

?>