<?php

require_once '../../db/db.php';
require_once("../../models/usuario_model.php"); //aqui estan todas las clases

$per=new Usuario_model();
$datos=array($_POST['IDx']);
$per->xUsuario($datos);
return 1;



?>