<?php

require_once '../../db/db.php';
require_once("../../models/citas_model.php"); //aqui estan todas las clases

$per=new Citas_model();
$datos=array($_POST['IDx']);
$per->xCitas($datos);
return 1;



?>