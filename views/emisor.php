<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias2.php';//parte del codigo html principal
?>


<p class="lead" style="margin-top: 0px" >Emisor de Facturas</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar Emisor</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Emisor</h4>
        </div>

        <div class="modal-body">
                <div class="form-group">
                <form id="formAlumno" >
                <input type="hidden" name="opc" id="opc" value="0">



                  <label for="nombre">Nombre</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="30" required>
                  </div>

         
          <label>RFC</label>  
          <div class="col-sm">
          <input type="text" class="form-control" id="rfc" name="rfc" maxlength="15" placeholder="RFC"  >
          </div>


                      
        <label>Direccion</label>
        <div class="col-sm">
        <input type="text" class="form-control" id="direccion" name="direccion" maxlength="250" placeholder="Direccion" maxlength="300"  >
         </div>


                  <label for="email">Email</label>  
                  <div class="col-sm">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email"  >
              </div>
   

                  <label for="telefono">Teléfono movil</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono movil" maxlength="10"  required >
              </div>
     

                  <label>Folio Fiscal</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio Fiscal" maxlength="20" >
              </div>


                  <label>CSD</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="csd" name="csd" placeholder="CSD" maxlength="20"  >
              </div>


                  <label>CP</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="cp" name="cp" placeholder="Código postal" maxlength="5" required>
              </div>


                  <label>Régimen</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="regimen" name="regimen" placeholder="Régimen" maxlength="50"  >
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


<div class="collapse" id="xAlumno" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body ">
  <form id="formXAlumno" >
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar al profesor ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar Alumno</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php
            $table = new tablacuerpo();
             $table->emisor("SELECT * FROM emisor order by Nombre",1);
             ?>



 <?php include 'footer.php'; ?>




      <script>
      $(document).ready(function(){

      // =============================VALIDAR
      $('#formAlumno').validate({
       rules: {
          nombre: {
             required: true,
             minlength: 5
          },
          cp: {
             required: true,
             minlength: 5
          },
          telefono: {
             required: true,
             minlength: 10
          },
          email: {
             required: true,
             email: true
          },
          agree: "required"
       },
       messages: {           
        nombre: {
             required: "Por favor ingresa tu nombre completo",
             minlength: "Tu nombre debe ser de no menos de 5 caracteres"
          },
          cp: {
             required: "Por favor ingresa tu cp valido",
             minlength: "Tu cp debe ser de 5 números"
          },
        telefono: {
             required: "Por favor ingresa el número de teléfono completo",
             minlength: "Tu teléfono debe ser de no menos de 10 números"
          },
        email: "Por favor ingresa un correo válido",
          agree: "Por favor acepta nuestra política",
          luckynumber: {
             required: "Por favor"
          }
       },
       errorElement: "em",
       errorPlacement: function (error, element) {
          // Add the `help-block` class to the error element
          error.addClass("help-block");
 
          if (element.prop( "type" ) === "checkbox") {
             error.insertAfter(element.parent("label") );
          } else {
             error.insertAfter(element);
          }
       },
       highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
       },
       unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );  
       } 
    });

      //==============================



       $('#saveAlumno').click(function(){


        if($("#formAlumno").valid())
    { 

          datos=$('#formAlumno').serialize();
         var opc  = document.getElementById("opc").value;
         if(opc == 0) { 

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/profesor/save.php",
              success:function(data){
                  window.location="../views/profesor.php";
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/profesor/update.php",
              success:function(data){
                  window.location="../views/profesor.php";
                 }
            }); 
             }
        }
          });
       



          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var apellido  = $('#'+id).children('td[data-target=Apellido]').text();
                var direccion  = $('#'+id).children('td[data-target=Direccion]').text();
                var matricula  = $('#'+id).children('td[data-target=Matricula]').text();
                var movil  = $('#'+id).children('td[data-target=Movil]').text();
                var profesion  = $('#'+id).children('td[data-target=Profesion]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#nombre').val(nombre);
                $('#apellido').val(apellido);
                $('#direccion').val(direccion);                   
                $('#matricula').val(matricula);
                $('#movil').val(movil);
                $('#profesion').val(profesion);
                $('#opc').val(opc);
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
                url:"../controllers/profesor/delete.php",
                success:function(data){
                    window.location="../views/profesor.php";
                  }
              }); 
          });

    });
</script>
