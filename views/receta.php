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
                  
                  <label for="nombre">Fecha Elaboración</label>
                  <div class="col-sm">
                  <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha elaboración" maxlength="50" required  >
                  </div>

                  <label>Médico</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="cedula" name="cedula" maxlength="30"  placeholder="Cédula" required >
                  </div>

                  <label>Paciente</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="especialidad" name="especialidad" maxlength="250" placeholder="Especialidad"  >
                  </div>

                  <label for="telefono">Servicio</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="sangre" name="sangre" placeholder="Tipo sangre" maxlength="10" required   >
                  </div>

                  <label for="email">Número de expediente</label>
                  <div class="col-sm">
                  <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Fecha de nacimiento"   >
                  </div>

                  <label for="email">Diagnóstico </label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Télefono" maxlength="10"  >
                  </div>

                  <label for="email">Clave y Nombre Genérico del Medicamento</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="movil" name="movil" placeholder="Móvil"  maxlength="10" >
                  </div>

                  <label for="email">Cantidad recetada</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required maxlength="200" >
                  </div>

                  <label for="email">Cantidad surtida</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required maxlength="200" >
                  </div>

                  <label for="email">Indicaciones</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required maxlength="200" >
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
  Confirme si desea eliminar el Médico ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar médico</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php
            $table = new tablacuerpo();
             $table->receptor("SELECT * FROM medicos order by Nombre",1);
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
         if(opc == 0) { 

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/medicos/save.php",
              success:function(data){
                  window.location="../views/medicos.php";
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/medicos/update.php",
              success:function(data){
                  window.location="../views/medicos.php";
                 }
            }); 
             }
            
            }
          });
        






          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var rfc  = $('#'+id).children('td[data-target=RFC]').text();
                var direccion  = $('#'+id).children('td[data-target=Direccion]').text();
                var telefono  = $('#'+id).children('td[data-target=Telefono]').text();
                var email  = $('#'+id).children('td[data-target=Email]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#nombre').val(nombre);
                $('#rfc').val(rfc);
                $('#direccion').val(direccion);                   
                $('#telefono').val(telefono);
                $('#email').val(email);
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
                url:"../controllers/medicos/delete.php",
                success:function(data){
                    window.location="../views/medicos.php";
                  }
              }); 
          });

    });
</script>
