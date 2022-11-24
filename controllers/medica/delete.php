<?php

require_once '../../db/db.php';
require_once("../../models/medica_model.php"); //aqui estan todas las clases

$per=new Medica_model();
$datos=array($_POST['IDx']);
$per->xMedica($datos);
return 1;



?>