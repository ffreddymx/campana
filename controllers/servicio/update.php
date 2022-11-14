<?php

require_once '../../db/db.php';
require_once("../../models/servicio_model.php"); //aqui estan todas las clases

$per=new Servicio_model();
$datos=array($_POST['cli'],$_POST['descripcion'],$_POST['costo'],$_POST['cantidad'],$_POST['iva'],$_POST['tipo'],$_POST['base'],$_POST['tasa'],$_POST['ID']);
$per->updateServicio($datos);
return 1;

?>