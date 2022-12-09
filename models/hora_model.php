<?php

class Hora_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_hora(){
        $consulta=$this->db->query("SELECT * from hora");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_horaid($id){
        $consulta=$this->db->query("SELECT * from hora where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    //Medicamento 	Indicaciones 	idreceta 		
    public function saveHora($datos){

        $this->db->exec("INSERT INTO comunidad(Comunidad) values('$datos[0]')");
    
    }

    public function updateComunidad($datos){

        $this->db->exec("UPDATE comunidad set Comunidad='$datos[0]' where id = '$datos[1]'  ");
        
    }

    public function xComunidad($datos){

        $this->db->exec("DELETE FROM comunidad  where id = '$datos[0]'  ");
            
    }

}

?>