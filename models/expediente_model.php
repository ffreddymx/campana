<?php

class Expediente_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_expediente(){
        $consulta=$this->db->query("SELECT * from expediente");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_expedienteid($id){
        $consulta=$this->db->query("SELECT * from expediente where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    //Fecha 	idmedico idpaciente Expediente
    public function saveExpediente($datos){

        $this->db->exec("INSERT INTO expediente(Fecha,idmedico,idpaciente,Expediente) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]')");
    
    }

    public function updateExpediente($datos){

        $this->db->exec("UPDATE expediente set Fecha='$datos[0]',idmedico='$datos[1]',idpaciente='$datos[2]',Expediente='$datos[3]' where id = '$datos[4]'  ");
        
    }

    public function xExpediente($datos){

        $this->db->exec("DELETE FROM expediente  where id = '$datos[0]'  ");
            
    }

}

?>