<?php


class tablacuerpo{


    private $db;
		private $alumnos;
    private $target;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->alumnos = array();
        $this->target = array();
    }


public function usuario($a,$link)
    {           
      $consulta = $this->db->query($a);
			while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
				$this->alumnos[] = $filas;
			}
      echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
            
        foreach($this->alumnos[0] as $key=>$value){
                  echo'<th>' . ($key) . '</th>';
                  $this->target[] = $key;
               }
  
               echo "<th colspan='2' style='width:50px;' >Acciones</th>";
               echo '</tr></thead><tbody border="1">';

                foreach ( $this->alumnos as $r ) {
                 echo '<tr id='.$r["id"].'>';
                 $i = 0;
                    foreach ( $r as $v ) {
                    echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                    $i++;
                }
                if($link!=0){
                  ?>
            <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
            <td style='width:30px;'><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
             <?php       
                   } 
                echo '</tr>';
                }
        echo '</tbody> </table>';
    }

  //==============================================================

    public function emisor($a,$link)
    {           
      $consulta = $this->db->query($a);
			while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
				$this->alumnos[] = $filas;
			}
      echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
            
        foreach($this->alumnos[0] as $key=>$value){
                  echo'<th>' . ($key) . '</th>';
                  $this->target[] = $key;
               }
  
               echo "<th colspan='2' style='width:50px;' >Acciones</th>";
               echo '</tr></thead><tbody border="1">';

                foreach ( $this->alumnos as $r ) {
                 echo '<tr id='.$r["id"].'>';
                 $i = 0;
                    foreach ( $r as $v ) {
                    echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                    $i++;
                }
                if($link!=0){
                  ?>
            <td style="width:30px;"><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></a></td>     
            <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
             <?php       
                   } 
                echo '</tr>';
                }
        echo '</tbody> </table>';
    }


  //==============================================================GRUPO
  public function receptor($a,$link)
  {           
    $consulta = $this->db->query($a);
    while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
      $this->alumnos[] = $filas;
    }
    echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
          
      foreach($this->alumnos[0] as $key=>$value){
                echo'<th>' . ($key) . '</th>';
                $this->target[] = $key;
             }
             echo "<th colspan='2' style='width:50px;' >Acciones</th>";
             echo '</tr></thead><tbody border="1">';

              foreach ( $this->alumnos as $r ) {
               echo '<tr id='.$r["id"].'>';
               $i = 0;
                  foreach ( $r as $v ) {
                  echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                  $i++;
              }
              if($link!=0){
                ?>
                            <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                            <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
           <?php       
                 } 
              echo '</tr>';
              }
      echo '</tbody> </table>';
  }


  //==============================================================RECETAS
    public function recetas($a,$link)
    {           
      $consulta = $this->db->query($a);
      while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
        $this->alumnos[] = $filas;
      }
      echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
            
        foreach($this->alumnos[0] as $key=>$value){
                  echo'<th>' . ($key) . '</th>';
                  $this->target[] = $key;
               }
               echo "<th colspan='4' style='width:50px;' >Acciones</th>";
               echo '</tr></thead><tbody border="1">';
  
                foreach ( $this->alumnos as $r ) {
                 echo '<tr id='.$r["id"].'>';
                 $i = 0;
                    foreach ( $r as $v ) {
                    echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                    $i++;
                }
                if($link!=0){
                  ?>
                              <td style='width:30px;'><a class="btn btn-warning btn-sm" href="medica.php?num=<?php echo $r['id'];?>"><i class="fas fa-eye"></i></a></td>     
                              <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                              <td style='width:30px;'><a class="btn btn-info btn-sm"  href="printreceta.php?num=<?php echo $r['id'];?>"><i class="fas fa-print"></i></a></td>     
                              <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
             <?php       
                   } 
                echo '</tr>';
                }
        echo '</tbody> </table>';
    }
//============================================================================
    
//==============================================================EXPEDIENTES
public function expediente($a,$link,$oculto)
{           
  $consulta = $this->db->query($a);
  while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
    $this->alumnos[] = $filas;
  }
  echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
        
            $i=0;//para ocultar las columnas
            foreach($this->alumnos[0] as $key=>$value){
                      if($i<=$oculto)
                      echo'<th style="display:none;">' . ($key) . '</th>';
                      else 
                      echo'<th >' . ($key) . '</th>';
                      $this->target[] = $key;
                      $i++;
                   }
                   echo "<th colspan='3' style='width:50px;' >Acciones</th>";
                   echo '</tr></thead><tbody border="1">';
                    foreach ( $this->alumnos as $r ) {
                     echo '<tr id='.$r["id"].'>';
                     $i = 0;
                        foreach ( $r as $v ) {
                          if($i<=$oculto)
                          echo '<td style="display:none;" data-target="'.$this->target[$i].'">'.$v.'</td>';
                          else
                          echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
           
                          $i++;
                    }

            if($link!=0){
              ?>
                          <td style='width:30px;'><a class="btn btn-warning btn-sm" href="receta.php?num=<?php echo $r['Expediente'];?>"><i class="fas fa-eye"></i></a></td>     
                          <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                          <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
         <?php       
               } 
            echo '</tr>';
            }
    echo '</tbody> </table>';
}
//============================================================================

//==============================================================MEDICA
public function medica($a,$link)
{           
  $consulta = $this->db->query($a);
  while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
    $this->alumnos[] = $filas;
  }
  echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
        
    foreach($this->alumnos[0] as $key=>$value){
              echo'<th>' . ($key) . '</th>';
              $this->target[] = $key;
           }
           echo "<th colspan='2' style='width:50px;' >Acciones</th>";
           echo '</tr></thead><tbody border="1">';

            foreach ( $this->alumnos as $r ) {
             echo '<tr id='.$r["id"].'>';
             $i = 0;
                foreach ( $r as $v ) {
                echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                $i++;
            }
            if($link!=0){
              ?>
                          <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                          <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
         <?php       
               } 
            echo '</tr>';
            }
    echo '</tbody> </table>';
}


//==============================================================COMUNIDAD
public function comunidad($a,$link)
{           
  $consulta = $this->db->query($a);
  while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
    $this->alumnos[] = $filas;
  }
  echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
        
    foreach($this->alumnos[0] as $key=>$value){
              echo'<th>' . ($key) . '</th>';
              $this->target[] = $key;
           }
           echo "<th colspan='2' style='width:50px;' >Acciones</th>";
           echo '</tr></thead><tbody border="1">';

            foreach ( $this->alumnos as $r ) {
             echo '<tr id='.$r["id"].'>';
             $i = 0;
                foreach ( $r as $v ) {
                echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                $i++;
            }
            if($link!=0){
              ?>
                          <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                          <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
         <?php       
               } 
            echo '</tr>';
            }
    echo '</tbody> </table>';
}



  //==============================================================Servicio
  public function servicio($a,$link)
  {           
    $consulta = $this->db->query($a);
    while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
      $this->alumnos[] = $filas;
    }
    echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
          
      foreach($this->alumnos[0] as $key=>$value){
                echo'<th>' . ($key) . '</th>';
                $this->target[] = $key;
             }
             echo "<th colspan='2' style='width:50px;' >Acciones</th>";
             echo '</tr></thead><tbody border="1">';

              foreach ( $this->alumnos as $r ) {
               echo '<tr id='.$r["id"].'>';
               $i = 0;
                  foreach ( $r as $v ) {
                  echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                  $i++;
              }
              if($link!=0){
                ?>
               

                            <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                            <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumnox" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        

           <?php       
                 } 
              echo '</tr>';
              }
      echo '</tbody> </table>';
  }



  //==============================================================cotizar
  public function cotizar($a,$link)
  {           
    $consulta = $this->db->query($a);
    while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
      $this->alumnos[] = $filas;
    }
    echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
          
      foreach($this->alumnos[0] as $key=>$value){
                echo'<th>' . ($key) . '</th>';
                $this->target[] = $key;
             }
             echo "<th colspan='4' style='width:50px;' align='center' >Acciones</th>";
             echo '</tr></thead><tbody border="1">';

              foreach ( $this->alumnos as $r ) {
               echo '<tr id='.$r["id"].'>';
               $i = 0;
                  foreach ( $r as $v ) {
                  echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                  $i++;
              }
              if($link!=0){
                ?>
                            <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                            <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumnox" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
                            <td style="width:30px;"><a class="btn btn-dark btn-sm"  href="cotizarpdf.php?num=<?php echo $r['id'];?>" ><i class="fas fa-print"></i></a></td>        
                            <td style="width:30px;"><a class="btn btn-info btn-sm"  aria-controls="collapseExample"  data-toggle="modal" data-target="#myModalemail" data-role="emailpdf" data-id="<?php echo $r['id']; ?>"><i class="fa fa-envelope-open"></i></a></td>        
           <?php       
                 } 
              echo '</tr>';
              }
      echo '</tbody> </table>';
  }


  //==============================================================CITAS
public function citas($a,$link,$oculto)
{           
  $consulta = $this->db->query($a);
  while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
    $this->alumnos[] = $filas;
  }
  echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
        
            $i=0;//para ocultar las columnas
            foreach($this->alumnos[0] as $key=>$value){
                      if($i<=$oculto)
                      echo'<th style="display:none;">' . ($key) . '</th>';
                      else 
                      echo'<th >' . ($key) . '</th>';
                      $this->target[] = $key;
                      $i++;
                   }
                   echo "<th colspan='3' style='width:50px;' >Acciones</th>";
                   echo '</tr></thead><tbody border="1">';
                    foreach ( $this->alumnos as $r ) {
                     echo '<tr id='.$r["id"].'>';
                     $i = 0;
                        foreach ( $r as $v ) {
                          if($i<=$oculto)
                          echo '<td style="display:none;" data-target="'.$this->target[$i].'">'.$v.'</td>';
                          else
                          echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
           
                          $i++;
                    }

            if($link!=0){
              ?>
                          <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                          <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumno" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
         <?php       
               } 
            echo '</tr>';
            }
    echo '</tbody> </table>';
}
//============================================================================

    //==============================================================facturas
    public function factura($a,$link)
    {           
      $consulta = $this->db->query($a);
      while($filas = $consulta->fetch(PDO::FETCH_ASSOC) ){
        $this->alumnos[] = $filas;
      }
      echo "<table class='table table-sm table-hover'><thead class='thead-dark'><tr> ";//iniciamos la tabla
            
        foreach($this->alumnos[0] as $key=>$value){
                  echo'<th>' . ($key) . '</th>';
                  $this->target[] = $key;
               }
               echo "<th colspan='3' style='width:50px;' >Acciones</th>";
               echo '</tr></thead><tbody border="1">';
  
                foreach ( $this->alumnos as $r ) {
                 echo '<tr id='.$r["id"].'>';
                 $i = 0;
                    foreach ( $r as $v ) {
                    echo '<td data-target="'.$this->target[$i].'">'.$v.'</td>';
                    $i++;
                }
                if($link!=0){
                  ?>
                 
  
                              <td style='width:30px;'><a class="btn btn-info btn-sm" aria-controls="collapseExample" data-toggle="modal" data-target="#myModal" data-role="updateAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-edit"></i></a></td>     
                              <td style="width:30px;"><a class="btn btn-danger btn-sm" aria-controls="xAlumno" data-toggle="collapse" href="#xAlumnox" data-role="xAlumno" data-id="<?php echo $r['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>        
                              <td style="width:30px;"><a class="btn btn-dark btn-sm"  href="facturapdf.php?num=<?php echo $r['Factura'];?>" ><i class="fas fa-print"></i></a></td>        
  
             <?php       
                   } 
                echo '</tr>';
                }
        echo '</tbody> </table>';
    }











}

?>
