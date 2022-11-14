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


<p class="lead" style="margin-top: 0px" >Lista de Facturas</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
<a role="button" class="btn btn-warning" href="impresionpdf.php" >Imprimir</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Servicio</h4>
        </div>

        <div class="modal-body">

        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >
               
                  

                  <div class="col-sm">
                <div class="form-group">
                  <label>Cliente</label>
                  <div class="mb-3">
                    <select class="form-select" name="cli" id="cli">
                        <option selected disabled>Seleccione al cliente</option>
                        <?php
                        foreach($servi as $servis){ 
                        echo "<option value='".$servis['id']."'>".$servis['Nombre']."</option>";
                        }
                        ?>
                    </select>
                </div>              </div>
            </div>


                  <label>Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion"  placeholder="Describir el servicio..." rows="3"></textarea>

              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                                    <label>Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
 placeholder="Costo"  >
              </div>
            </div>


                      <div class="col-sm">
                <div class="form-group">
                  <label>Cantidad</label>
                  <input type="text" class="form-control" id="cantidad" name="cantidad" maxlength="250" 
 placeholder="Cantidad"  >
              </div>
            </div>


              <div class="col-sm">
                <div class="form-group">
                  <label>IVA</label>
                  <input type="text" class="form-control" id="iva" name="iva" placeholder="IVA" maxlength="10" pattern="^[0-9]+"  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Tipo</label>
                  <div class="mb-3">
                    <select class="form-select" name="tipo" id="tipo">
                        <option selected disabled>Seleccione el tipo</option>
                        <?php
                        foreach($tipo as $tipos){ 
                        echo "<option value='".$tipos['Nombre']."'>".$tipos['Nombre']."</option>";
                        }
                        ?>
                    </select>
                </div>              </div>
            </div>


            <div class="col-sm">
                <div class="form-group">
                  <label>Base</label>
                  <input type="text" class="form-control" id="base" name="base" placeholder="Base" maxlength="" pattern=""  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Tasa</label>
                  <input type="text" class="form-control" id="tasa" name="tasa" placeholder="Tasa" maxlength="" pattern=""  >
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




      <!-- Datos de la factura-->

  <div class="modal fade" id="facturacion" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Datos de la Factura</h4>
        </div>

        <div class="modal-body">

        <div class="col-sm">
                <div class="form-group">
                <form id="formFactura" >
                <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >
               
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                                    <label>Factura</label>
                  <input type="text" class="form-control" id="factura" name="factura" maxlength="30" pattern=""
 placeholder="Factura"  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Moneda</label>
                  <div class="mb-3">
                    <select class="form-select" name="moneda" id="moneda">
                        <option selected disabled>Moneda</option>
                        <option value="Nacional">Nacional</option>
                        <option value="Extrangera">Extrangera</option>
                    </select>
                </div>              </div>
            </div>


           <div class="col-sm">
                <div class="form-group">
                  <label>Forma de pago</label>
                  <div class="mb-3">
                    <select class="form-select" name="pago" id="pago">
                        <option selected disabled>Forma de pago</option>
                        <option value="Contado">Contado</option>
                        <option value="Credito">Credito</option>
                        <option value="Credito">Por definir</option>
                    </select>
                </div>              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Método de pago</label>
                  <div class="mb-3">
                    <select class="form-select" name="metodo" id="metodo">
                        <option selected disabled>Método de pago</option>
                        <option value="Pagos en parcialidades">Pagos en parcialidades</option>
                        <option value="Pagos diferidos">Pagos diferidos</option>
                    </select>
                </div>              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                                    <label>Fecha</label>
                  <input type="date" class="form-control" id="fecha" name="fecha"  >
              </div>
            </div>




        </div>





        <div class="modal-footer">
        <span  class="btn btn-info" data-toggle="collapse" href="#collapseExample" id="saveFactura">Guardar</span>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>

    </div>
  </div>





<div class="collapse" id="xAlumnox" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body ">
  <form id="formXAlumno" >
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar el servicio ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>


         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar Servicio</span>
         <a   data-toggle="collapse" href="#xAlumnox"  class="btn btn-success">Cancelar</a>



  </form>
  </div>
</div>

            <?php
            $table = new tablacuerpo();
             $table->factura("SELECT S.id, R.id as IDR, S.Factura,R.Nombre as Receptor, S.Descripcion, S.VUnitario, S.Cantidad,S.IVA,S.Tipo, S.Base,S.Tasa
              FROM servicios as S inner join receptor as R on R.id = S.idreceptor
              where S.Factura != '' ",1);
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
              url:"../controllers/servicio/update.php",
              success:function(data){
                  window.location="../views/servicio.php";
                 }
            }); 
             }
          });



          $('#saveFactura').click(function(){
          datos=$('#formFactura').serialize();
         var opc  = document.getElementById("opc").value;
         if(opc == 0) { 
            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/factura/save.php",
              success:function(data){
                  window.location="../views/servicio.php";
                 }
            }); 

          }
          else {
            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/factura/update.php",
              success:function(data){
                  window.location="../views/servicio.php";
                 }
            }); 
             }
          });





          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var descri  = $('#'+id).children('td[data-target=Descripcion]').text();
                var unitario  = $('#'+id).children('td[data-target=VUnitario]').text();
                var cantidad  = $('#'+id).children('td[data-target=Cantidad]').text();
                var iva  = $('#'+id).children('td[data-target=IVA]').text();
                var tipo  = $('#'+id).children('td[data-target=Tipo]').text();
                var base  = $('#'+id).children('td[data-target=Base]').text();
                var tasa  = $('#'+id).children('td[data-target=Tasa]').text();

                var idr  = $('#'+id).children('td[data-target=IDR]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#descripcion').val(descri);
                $('#costo').val(unitario);
                $('#cantidad').val(cantidad);                   
                $('#iva').val(iva);
                $('#tipo').val(tipo);
                $('#base').val(base);
                $('#tasa').val(tasa);
                $('#opc').val(opc);

                $('#cli > option[value="'+idr+'"]').attr('selected', 'selected');

          });


          $(document).on('click','a[data-role=xAlumno]',function(){
                var id  = $(this).data('id');
                $('#IDx').val(id);

          });


          $(document).on('click','a[data-role=agrfac]',function(){
                var id  = $(this).data('id');
                alert(id);

                $.ajax({
                type:"GET",
                data:id,
                url:"../controllers/factura/save.php",
                success:function(data){
                    window.location="../views/servicio.php";
                  }
              }); 

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
