<?php

require_once '../../db/db.php';
require_once("../../models/expediente_model.php"); //aqui estan todas las clases

$per=new Expediente_model();
$datos=array($_POST['IDx']);
$per->xExpediente($datos);
return 1;



?>