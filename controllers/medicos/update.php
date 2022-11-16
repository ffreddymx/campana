<?php

require_once '../../db/db.php';
require_once("../../models/medicos_model.php"); //aqui estan todas las clases

$per=new Medicos_model();
$datos=array($_POST['nombre'],$_POST['cedula'],$_POST['especialidad'],$_POST['sangre'],$_POST['nacimiento'],$_POST['telefono'],$_POST['movil'],$_POST['direccion'],$_POST['ID']);
$per->updateMedicos($datos);
return 1;

?>