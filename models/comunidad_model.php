<?php

class Comunidad_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_comunidad(){
        $consulta=$this->db->query("SELECT * from comunidad order by Comunidad");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_comunidadid($id){
        $consulta=$this->db->query("SELECT * from comunidad where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    //Medicamento 	Indicaciones 	idreceta 		
    public function saveComunidad($datos){

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