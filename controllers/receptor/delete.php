<?php

require_once '../../db/db.php';
require_once("../../models/receptor_model.php"); //aqui estan todas las clases

$per=new Receptor_model();
$datos=array($_POST['IDx']);
$per->xReceptor($datos);
return 1;



?>