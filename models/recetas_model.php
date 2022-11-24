<?php

class Receptor_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_receptor(){
        $consulta=$this->db->query("SELECT * from receptor");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_receptorid($id){
        $consulta=$this->db->query("SELECT * from receptor where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }



    public function saveReceptor($datos){

        $this->db->exec("INSERT INTO receptor(Nombre,RFC,Direccion,Telefono,Email) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')");
    
    }

    public function updateReceptor($datos){

        $this->db->exec("UPDATE receptor set Nombre='$datos[0]',RFC='$datos[1]',Direccion='$datos[2]',Telefono='$datos[3]',Email='$datos[4]' where id = '$datos[5]'  ");
        
    }

    public function xReceptor($datos){

        $this->db->exec("DELETE FROM receptor  where id = '$datos[0]'  ");
            
    }

}

?>