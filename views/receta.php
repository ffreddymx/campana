<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias.php';//parte del codigo html principal

?>


<div class='dashboard'>

      <div class='dashboard-app'>
      <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
      <div class='dashboard-content'>
      <div class='container'>

      



<p class="lead" style="margin-top: 0px" >Receta Médica</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nueva receta</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos de la receta</h4>
        </div>

        <div class="modal-body">
                <div class="form-group">
                <form id="formAlumno" >
                <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >

                  <input type="hidden" class="form-control" id="cedula" name="cedula"  >
                  <input type="hidden" class="form-control" id="especialidad" name="especialidad"  >


                  <label for="email">Folio</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio" >
                  </div>

                  <label for="nombre">Fecha Elaboración</label>
                  <div class="col-sm">
                  <input type="date" class="form-control" id="fecha" name="fecha"   >
                  </div>

 <!-- fecha,servicio,expediente,medicamento,recetada,surtida -->

                  <label for="telefono">Servicio</label>
                  <div class="col-sm">
                  <select class="custom-select" id="servicio" name="servicio">
                  <option selected>Seleccionar...</option>
                  <option value="Consulta externa">Consulta externa</option>
                  <option value="Urgencias">Urgencias</option>
                  <option value="Hospitalización">Hospitalización</option>
                  <option value="Otros">Otros...</option>
                  </select>
                  </div>

                  <label for="email">Número de expediente</label>
                  <div class="col-sm">
                  <input type="text" readonly class="form-control" id="expediente" name="expediente" value="<?php  echo $_GET["num"];?>  " placeholder="Número de expediente"   >
                  </div>

                  <label for="email">Cantidad recetada</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="recetada" name="recetada" placeholder="Cantidad recetada" >
                  </div>

                  <label for="email">Cantidad surtida</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="surtida" name="surtida" placeholder="Cantidad surtida"  >
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
  Confirme si desea eliminar la receta ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar receta</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php

            $table = new tablacuerpo();
            if(empty($_GET["num"]))
             $table->recetas("SELECT * FROM recetas order by id",1);
             else
             $table->recetas("SELECT * FROM recetas where Expediente = '".$_GET["num"]."' order by id",1);

             ?>



 <?php include 'footer.php'; ?>


      <script>
      $(document).ready(function(){

    $('#formAlumno').validate({
       rules: {
          nombre: {
             required: true,
             minlength: 5
          },
          comments: {
             required: true
          },
          telefono: {
             required: true,
             minlength: 10
          },
          password: {
             required: true,
             minlength: 5
          },
          confirm_password: {
             required: true,
             minlength: 5,
             equalTo: "#password"
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
        telefono: {
             required: "Por favor ingresa el número de teléfono completo",
             minlength: "Tu teléfono debe ser de no menos de 10 números"
          },
        comments: "Por favor ingresa un comentario",
          password: {
             required: "Por favor ingresa una contraseña",
             minlength: "Tu contraseña debe ser de no menos de 5 caracteres de longitud"
          },
          confirm_password: {
             required: "Ingresa un password",
             minlength: "Tu contraseña debe ser de no menos de 5 caracteres de longitud",
             equalTo: "Por favor ingresa la misma contraseña de arriba"
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




       $('#saveAlumno').click(function(){
        if($("#formAlumno").valid())
    { 
          datos=$('#formAlumno').serialize();
          var opc  = document.getElementById("opc").value;
          var exp  = document.getElementById("expediente").value;
         
         if(opc == 0) { 
            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/recetas/save.php",
              success:function(data){
                  window.location="../views/receta.php?num=" + exp ;
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/recetas/update.php",
              success:function(data){
                  window.location="../views/receta.php";
                 }
            }); 
             }
            
            }
          });
        


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var fecha  = $('#'+id).children('td[data-target=Fecha]').text();
                var servicio  = $('#'+id).children('td[data-target=Servicio]').text();
                var expediente  = $('#'+id).children('td[data-target=Expediente]').text();
                var recetada  = $('#'+id).children('td[data-target=Recetada]').text();
                var surtida  = $('#'+id).children('td[data-target=Surtida]').text();
                var folio  = $('#'+id).children('td[data-target=Folio]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#fecha').val(fecha);
                $('#servicio').val(servicio);
                $('#expediente').val(expediente);                   
                $('#recetada').val(recetada);
                $('#surtida').val(surtida);
                $('#folio').val(folio);
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
                url:"../controllers/recetas/delete.php",
                success:function(data){
                    window.location="../views/receta.php";
                  }
              }); 
          });

    });
</script>
