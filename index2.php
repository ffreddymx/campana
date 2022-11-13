<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>INSABI</title>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<link href="statics/menu.css" rel="stylesheet" id="bootstrap-css">
<link href="librerias/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="librerias/assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>






</head>

<style>
  body {
  background-image: url(statics/inicio.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }
</style>




<body >
	
<section  style="margin_top: 20px; " >



<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="statics/insabi.png"   >
                </div>

                <form id="frmLoginx" >

                <div class="form-group">
                  <input type="email" id="user" name="user" class="form-control _ge_de_ol" type="text" placeholder="Usuario" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" id="pass" name="pass"  class="form-control _ge_de_ol" type="text" placeholder="Contraseña" required="" aria-required="true">
                </div>


                <div class="form-group">
                  <div class="_btn_04">
                    <a  id="entrarSistema"  href="#"  >Iniciar sesión</a>
                  </div>
                </div>
                <div class="logo2">
                  <img src="statics/logo.png"   >
                </div>

                <div class="form-group nm_lk"><p>Centro de Salud Cerro de las Campanas</p></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


</section>





</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){


		$('#entrarSistema').click(function(){
/*		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}
*/
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