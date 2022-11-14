<?php

class Usuario_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_usuario(){
        $consulta=$this->db->query("SELECT * from usuario");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function saveUsuario($datos){

        $this->db->exec("INSERT INTO usuario(usuario,password,Nombre,Tipo) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]')");
    
    }

    public function updateUsuario($datos){

        $this->db->exec("UPDATE usuario set usuario='$datos[0]',password='$datos[1]',Nombre='$datos[2]',Tipo='$datos[3]' where id = '$datos[4]'  ");
        
    }

    public function xUsuario($datos){

        $this->db->exec("DELETE FROM usuario  where id = '$datos[0]'  ");
            
    }

}

?>