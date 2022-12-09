<?php

require_once '../../db/db.php';
require_once("../../models/comunidad_model.php"); //aqui estan todas las clases

$per=new Comunidad_model();
$datos=array($_POST['IDx']);
$per->xComunidad($datos);
return 1;



?>