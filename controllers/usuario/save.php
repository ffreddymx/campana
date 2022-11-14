<?php

require_once '../../db/db.php';
require_once("../../models/usuario_model.php"); //aqui estan todas las clases

$per=new Usuario_model();
$datos=array($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['tipo']);
$per->saveUsuario($datos);
return 1;

//Nombre,Apellido,Direccion,Movil,Profesion

?>
