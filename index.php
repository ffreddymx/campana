<?php
session_start();
require_once 'db/db.php';
require_once 'models/tipo_model.php';

$tipo=new tipo_model();
$tipo = $tipo->get_tipo();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cerro de las Campanas</title>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>


</head>

<style>
  body {
  background-image: url(statics/inicio.jpg);
  background-color:#000;
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }

  .container {
  height: 100px;
}
</style>

<body >
	
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Paciente</h4>
        </div>

        <div class="modal-body">
                <div class="form-group">
                <form id="formAlumno" >
                <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >
                  
                  <label for="nombre">Nombre completo</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" maxlength="50" required  >
                  </div>

                  <label>CURP</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="rfc" name="rfc" maxlength="30"  placeholder="RFC"  >
                  </div>

                  <label>Dirección</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="direccion" name="direccion" maxlength="250" placeholder="Dirección"  >
                  </div>

                  <label for="telefono">Teléfono</label>
                  <div class="col-sm">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="10" required   >
                  </div>

                  <label for="email">Email</label>
                  <div class="col-sm">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required  >
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

    </div>
  </div>




<section  style="margin_top: 2px; " >

<div class="container "  style="margin_top: 0px; ">
<br><br><br><br><br><br>

<h1 class="display-1 text-center text-primary">Centro de salud</h1>
<h1 class="display-1 text-center text-primary">01NBSS</h1>
<h1 class="display-1 text-center text-primary">Cerro de las Campanas</h1>

<h1 class="display-1 text-center text-primary"><a href="index2.php" >Acceder</a></h1>
<a class="nav-link display-1 text-center text-primary" href="#" data-toggle="modal"  data-target="#myModal">Registrarse</a>


</section>
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){




    $('#formAlumno').validate({
       rules: {
        cliente: {
             required: true,
             minlength: 5
          },
          municipio: {
             required: true,
             minlength: 5
          },
          servicio: {
             required: true
          },
          colonia: {
             required: true,
             minlength: 5
          },
          calle: {
             required: true
          },
          telefono: {
             required: true,
             minlength: 10
          },
          movil: {
             required: true,
             minlength: 10
          },
          numero: {
            required: true,
            number:true
          },
          cp: {
            required: true,
            number:true
          },

          email: {
             required: true,
             email: true
          },

          agree: "required"
       },
       messages: {           
        cliente: {
             required: "Por favor ingresa tu nombre completo",
             minlength: "Tu nombre debe ser de no menos de 5 caracteres"
          },
        telefono: {
             required: "Por favor ingresa el número de teléfono completo",
             minlength: "Su teléfono debe ser de 10 números"
          },
          movil: {
             required: "Por favor ingresa el número de teléfono completo",
             minlength: "Su teléfono debe ser de 10 números"
          },
          numero: {
             required: "Por favor ingresa el número de calle",
             number: "Debe ingresar informacion valida"
          },
          cp: {
             required: "Por favor ingresa su número postal",
             number: "Debe ingresar informacion valida"
          },
          colonia: {
             required: "Por favor ingrese su colonia",
             minlength: " Por favor ingrese la información valida"
          },
          municipio: {
             required: "Por favor ingrese su municipio",
             minlength: " Por favor ingrese la información valida"
          },
          calle: {
             required: "Por favor ingrese su calle",
             minlength: " Por favor ingrese la información valida"
          },
          servicio: {
             required: "Por favor seleccione su servicio"
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
    
            $.ajax({
              type:"POST",
              data:datos,
              url:"controllers/receptor/save.php",
              success:function(data){
                  window.location="index.php";
                 }
            }); 

          }

          });

$('#entrarSistema').click(function(){

	datos=$('#frmLoginx').serialize();

		$.ajax({
			type:"POST",
			data:datos,
			url:"controllers/login.php",
			success:function(r){

				if(r==1){
					window.location="views/inicio.php";
         
				}else{
					alert("No se pudo acceder verifique sus datos de acceso :(");
				}
			    }
		    });
	   });




	});


</script>