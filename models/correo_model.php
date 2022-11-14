<?php

class Servicio_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_servicio(){
        $consulta=$this->db->query("SELECT * from servicios");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function get_servicioid($id){
        $consulta=$this->db->query("SELECT * from servicios where Factura = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }


    public function consultar2(){
        $consulta=$this->db->query("SELECT S.id, R.id as IDR, R.Nombre as Receptor, S.Descripcion, S.VUnitario, S.Cantidad,S.IVA,S.Tipo, S.Base,S.Tasa
        FROM servicios as S inner join receptor as R on R.id = S.idreceptor");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }



    
    public function saveServicio($datos){

        $this->db->exec("INSERT INTO servicios(idreceptor,Descripcion, VUnitario, Cantidad, IVA, Tipo, Base, Tasa) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')");
    
    }

    public function updateServicio($datos){

        $this->db->exec("UPDATE servicios set idreceptor='$datos[0]',Descripcion='$datos[1]',VUnitario='$datos[2]',Cantidad='$datos[3]',IVA='$datos[4]',Tipo='$datos[5]',Base='$datos[6]',Tasa='$datos[7]' where id = '$datos[8]'  ");
        
    }

    public function xServicio($datos){

        $this->db->exec("DELETE FROM servicios where id = '$datos[0]'  ");
            
    }

}

?>