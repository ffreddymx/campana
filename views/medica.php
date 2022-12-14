<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias.php';//parte del codigo html principal

$num = $_GET["num"];


?>


<div class='dashboard'>

      <div class='dashboard-app'>
      <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
      <div class='dashboard-content'>
      <div class='container'>

      



<p class="lead" style="margin-top: 0px" >Medicamentos y las Indicaciones</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar Medicamento</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del medicamento</h4>
        </div>

        <div class="modal-body">
                <div class="form-group">
                <form id="formAlumno" >
                <input type="hidden" name="opc" id="opc" value="0">
                <input type="hidden" name="ID" id="ID" >
       


 <!-- fecha,servicio,expediente,medicamento,recetada,surtida -->
                  <input type="hidden" name="num" id="num" value="<?php  echo $_GET["num"];?>"  >
                  
                  <label for="email">Medicamento</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="medicamento" name="medicamento" placeholder="Nombre del medicamento"   >
                  </div>

                  <label for="email">Indicaciones</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="indicacion" name="indicacion" placeholder="Indicaciones" >
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
  Confirme si desea eliminar el medicamento ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar medicamento</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php

            $table = new tablacuerpo();

            if(empty($_GET["num"]))
             $table->medica("SELECT * FROM medica order by id",1);
             else
             $table->medica("SELECT * FROM medica  where idreceta = '".$_GET["num"]."' order by id",1);

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
             required: "Por favor ingresa el n??mero de tel??fono completo",
             minlength: "Tu tel??fono debe ser de no menos de 10 n??meros"
          },
        comments: "Por favor ingresa un comentario",
          password: {
             required: "Por favor ingresa una contrase??a",
             minlength: "Tu contrase??a debe ser de no menos de 5 caracteres de longitud"
          },
          confirm_password: {
             required: "Ingresa un password",
             minlength: "Tu contrase??a debe ser de no menos de 5 caracteres de longitud",
             equalTo: "Por favor ingresa la misma contrase??a de arriba"
          },
        email: "Por favor ingresa un correo v??lido",
          agree: "Por favor acepta nuestra pol??tica",
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
         var num  = document.getElementById("num").value;

         if(opc == 0) { 

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/medica/save.php",
              success:function(data){

                  window.location="../views/medica.php?num=" + num ;
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/medica/update.php",
              success:function(data){
                  window.location="../views/medica.php";
                 }
            }); 
             }
            
            }
          });
        






          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var medicamento  = $('#'+id).children('td[data-target=Medicamento]').text();
                var indicacion  = $('#'+id).children('td[data-target=Indicaciones]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#medicamento').val(medicamento);
                $('#indicacion').val(indicacion);
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
                url:"../controllers/medica/delete.php",
                success:function(data){
                    window.location="../views/medica.php";
                  }
              }); 
          });

    });
</script>
