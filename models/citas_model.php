<?php

class Citas_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_citas(){
        $consulta=$this->db->query("SELECT * from cita");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_citasid($id){
        $consulta=$this->db->query("SELECT * from cita where id = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    //Fecha 	idmedico idpaciente Expediente
    public function saveCitas($datos){

        $this->db->exec("INSERT INTO cita(Fecha,Hora,idpaciente,Asistio) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]')");
    
    }

    public function updateCitas($datos){

        $this->db->exec("UPDATE cita set Fecha='$datos[0]',Hora='$datos[1]',idpaciente='$datos[2]',Asistio='$datos[3]' where id = '$datos[4]'  ");
        
    }

    public function xCitas($datos){

        $this->db->exec("DELETE FROM cita  where id = '$datos[0]'  ");
            
    }

}

?>