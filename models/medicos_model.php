<?php

class Medicos_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_receptor(){
        $consulta=$this->db->query("SELECT * from medicos");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_receptorid($id){
        $consulta=$this->db->query("SELECT * from medicos where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }



    public function saveMedicos($datos){

        $this->db->exec("INSERT INTO medicos(Nombre,Cedula,Especialidad,Sangre,Nacimiento,Telefono,Movil,Direccion) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')");
    
    }

    public function updateMedicos($datos){

        $this->db->exec("UPDATE medicos set Nombre = '$datos[0]',Cedula= '$datos[1]',Especialidad= '$datos[2]',Sangre= '$datos[3]',Nacimiento= '$datos[4]',Telefono= '$datos[5]',Movil= '$datos[6]',Direccion= '$datos[7]' where id = '$datos[8]'  ");
        
    }

    public function xMedicos($datos){

        $this->db->exec("DELETE FROM medicos  where id = '$datos[0]'  ");
            
    }

}

?>