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

      

<p class="lead" style="margin-top: 0px" >Usuarios de INSABI</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar usuario</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Usuario</h4>
        </div>

        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                  <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >

                  <label>Usuario</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" maxlength="30" 
  >


            <div class="col-sm">
                <div class="form-group">
                                    <label>Password</label>
                  <input type="text" class="form-control" id="password" name="password" maxlength="10" 
 placeholder="Password"  >
              </div>
            </div>


                      <div class="col-sm">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" maxlength="250" 
 placeholder="Nombre Completo"  >
              </div>
            </div>


              <div class="col-sm">
                <div class="form-group">
                  <label>Tipo</label>

<select name="tipo" id="tipo">
<option value="Admin">Admin</option>
<option value="Usuario">Usuario</option>
</select>

              </div>
            </div>

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
  Confirme si desea eliminar al Usuario ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar Usuario</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php
            $table = new tablacuerpo();
             $table->usuario("SELECT * FROM usuario order by Nombre",1);
             ?>



 <?php include 'footer.php'; ?>

 </div></div></div></div>


      <script>
      $(document).ready(function(){


        $('#formAlumno').validate({
       rules: {
        usuario: {
             required: true,
             minlength: 5
          },
          nombre: {
             required: true,
             minlength: 5
          },
          password: {
             required: true,
             minlength: 5
          },
          agree: "required"
       },
       messages: {           
        usuario: {
             required: "Por favor debes ingresar un usuario",
             minlength: "El usuario debe ser de no menos de 5 caracteres"
          },

          nombre: {
             required: "Por favor ingresa un nombre",
             minlength: "El nombre debe ser de no menos de 5 caracteres"
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
              url:"../controllers/usuario/save.php",
              success:function(data){
                  window.location="../views/usuario.php";
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/usuario/update.php",
              success:function(data){
                  window.location="../views/usuario.php";
                 }
            }); 
             }
            }
          });


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var usuario  = $('#'+id).children('td[data-target=usuario]').text();
                var password  = $('#'+id).children('td[data-target=password]').text();
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var tipo  = $('#'+id).children('td[data-target=Tipo]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#usuario').val(usuario);
                $('#password').val(password);
                $('#nombre').val(nombre);                   
                $('#opc').val(opc);

                $('#tipo > option[value="'+tipo+'"]').attr('selected', 'selected');

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
                url:"../controllers/usuario/delete.php",
                success:function(data){
                    window.location="../views/usuario.php";
                  }
              }); 
          });

    });
</script>
