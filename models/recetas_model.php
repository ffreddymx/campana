<?php

class Recetas_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_recetas(){
        $consulta=$this->db->query("SELECT * from recetas");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_recetasid($id){
        $consulta=$this->db->query("SELECT * from recetas where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


//Fecha Servicio Expediente Recetada Surtida Folio 	
//$_POST['folio'],$_POST['fecha'],$_POST['servicio'],$_POST['expediente'],$_POST['recetada'],$_POST['surtida']

    public function saveRecetas($datos){

        $this->db->exec("INSERT INTO recetas(Folio,Fecha,Servicio,Expediente,Recetada,Surtida) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')");
    
    }

    public function updateRecetas($datos){

        $this->db->exec("UPDATE recetas set Folio='$datos[0]',Fecha='$datos[1]',Servicio='$datos[2]',Expediente='$datos[3]',Recetada='$datos[4]',Surtida='$datos[5]' where id = '$datos[6]'  ");
        
    }

    public function xRecetas($datos){

        $this->db->exec("DELETE FROM recetas  where id = '$datos[0]'  ");
            
    }

}

?>