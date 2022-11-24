<?php

class Medica_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_recetas(){
        $consulta=$this->db->query("SELECT * from medica");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_recetasid($id){
        $consulta=$this->db->query("SELECT * from medica where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    //Medicamento 	Indicaciones 	idreceta 		
    public function saveMedica($datos){

        $this->db->exec("INSERT INTO medica(Medicamento,Indicaciones) values('$datos[0]','$datos[1]')");
    
    }

    public function updateMedica($datos){

        $this->db->exec("UPDATE medica set Medicamento='$datos[0]',Indicaciones='$datos[1]' where id = '$datos[2]'  ");
        
    }

    public function xMedica($datos){

        $this->db->exec("DELETE FROM medica  where id = '$datos[0]'  ");
            
    }

}

?>