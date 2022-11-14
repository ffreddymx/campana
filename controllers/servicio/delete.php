<?php

require_once '../../db/db.php';
require_once("../../models/servicio_model.php"); //aqui estan todas las clases

$per=new Servicio_model();
$datos=array($_POST['IDx']);
$per->xServicio($datos);
return 1;



?>