<?php

require_once '../../db/db.php';
require_once("../../models/medicos_model.php"); //aqui estan todas las clases

$per=new Medicos_model();
$datos=array($_POST['IDx']);
$per->xMedicos($datos);
return 1;



?>