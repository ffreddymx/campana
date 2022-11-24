<?php

require_once '../../db/db.php';
require_once("../../models/recetas_model.php"); //aqui estan todas las clases

$per=new Recetas_model();
$datos=array($_POST['IDx']);
$per->xRecetas($datos);
return 1;



?>