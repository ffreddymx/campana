<?php

class Factura_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_cotizar(){
        $consulta=$this->db->query("SELECT * from cotizar");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }
  

    public function get_factura($id){
        $consulta=$this->db->query("SELECT * from factura where folio = '$id' ");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }



    public function saveFactura($datos){
        //$_POST['factura'],$_POST['modena'],$_POST['pago'],$_POST['metodo'])
        //folio 	idreceptor 	idservicio 	Subtotal 	IVA 	Moneda 	FormaPago 	MetodoPago 	iduser 	
        $this->db->exec("INSERT INTO factura(folio,Moneda,FormaPago,MetodoPago,Fecha) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')");
        $this->db->exec("UPDATE servicios set Factura='$datos[0]' where Factura = ''  ");

    
    }


    public function updateCotizar($datos){

        $this->db->exec("UPDATE cotizar set cliente='$datos[0]',servicio='$datos[1]',costo='$datos[2]' where id = '$datos[3]'  ");
        
    }



    public function xServicio($datos){

        $this->db->exec("DELETE FROM servicios where id = '$datos[0]'  ");
            
    }

}

?>