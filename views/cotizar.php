<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias2.php';//parte del codigo html principal
require_once '../models/tipo_model.php';
require_once '../models/receptor_model.php';

$tipo=new tipo_model();
$tipo = $tipo->get_tipo();


$servi=new Receptor_model();
$servi = $servi->get_receptor();

?>


<p class="lead" style="margin-top: 0px" >Solicitudes de Cotización</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
  </div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Costo de la Cotización</h4>
        </div>
        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                  <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >

                  <label>Cliente</label>
            <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Datos del cliente..." maxlength="30"   >
              </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                  <label>Servicio</label>
                  <textarea class="form-control" id="servicio" name="servicio"  placeholder="Describir el servicio..." rows="3"></textarea>
              </div>
            </div>
         <div class="col-sm">
                <div class="form-group">
                <label>Costo del Servicio</label>
                  <input type="text" class="form-control" id="costo" name="costo" placeholder="Costo del Servicio"  >
              </div>
            </div>

            </div>
        <div class="modal-footer">
        <span  class="btn btn-info" data-toggle="collapse" href="#collapseExample" id="saveAlumno">Guardar</span>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>
    </div>
  </div>




  <div class="modal fade" id="myModalemail" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Enviar email de la cotización</h4>
        </div>
        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formMail" action="mail.php" method="post" >
                  <input type="hidden" name="IDe" id="IDe" >

                  <label>Correo del Cliente</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo del cliente..." required  >
              </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                  <label>Asunto</label>
                  <textarea class="form-control" id="asunto" name="asunto"  placeholder="Describir el servicio..." rows="3"></textarea>
              </div>
            </div>


            </div>
        <div class="modal-footer">
        <INPUT type="submit" value="Enviar Cotización">
        <!-- <span  class="btn btn-info" data-toggle="collapse" href="#collapseExample" id="saveAlumno">Enviar Cotización</span> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>
    </div>
  </div>


  

            <?php
            $table = new tablacuerpo();
             $table->cotizar("SELECT * from cotizar",1);
             ?>

 <?php include 'footer.php'; ?>




      <script>
      $(document).ready(function(){

      
       $('#saveAlumno').click(function(){
          datos=$('#formAlumno').serialize();
         var opc  = document.getElementById("opc").value;
         if(opc == 0) { 
            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/servicio/save.php",
              success:function(data){
                  window.location="../views/servicio.php";
                 }
            }); 

          }
          else {
            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/cotizar/update.php",
              success:function(data){
                  window.location="../views/cotizar.php";
                 }
            }); 
             }
          });


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var cliente  = $('#'+id).children('td[data-target=cliente]').text();
                var servicio  = $('#'+id).children('td[data-target=servicio]').text();
                var costo  = $('#'+id).children('td[data-target=costo]').text();

                var opc = 1;

                $('#ID').val(id);
                $('#cliente').val(cliente);
                $('#servicio').val(servicio);
                $('#costo').val(costo);
                $('#opc').val(opc);

          });



          $(document).on('click','a[data-role=emailpdf]',function(){
            var id  = $(this).data('id');
            $('#IDe').val(id);
            });


          $(document).on('click','a[data-role=xAlumno]',function(){
                var id  = $(this).data('id');
                $('#IDx').val(id);

          });


          $('#xAlumno').click(function(){
            datos=$('#formXAlumno').serialize();
              $.ajax({
                type:"POST",
                data:datos,
                url:"../controllers/servicio/delete.php",
                success:function(data){
                    window.location="../views/servicio.php";
                  }
              }); 
          });

    });
</script>
