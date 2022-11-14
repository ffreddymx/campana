<?php 
    session_start();
    if(isset($_SESSION['usuario'])){  
 ?>


    <?php require_once "dependencias.php"; ?>
    <div class='dashboard'>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
        <div class='dashboard-content'>
            <div class='container'>

            
                <div class='card'>
                    <div class='card-header'>
                        <h1>Cerro de las Campanas</h1>
                    </div>
                    <div class='card-body'>
                    <div class="row">

                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pacientes</h5>
                                    <p class="card-text">Consultar los pacientes </p>
                                    <a href="#" class="btn btn-info">Mas detalles</a>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios</h5>
                                    <p class="card-text">Lista de usuariarios registrados</p>
                                    <a href="#" class="btn btn-info">Mas detalles</a>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Historial medico</h5>
                                    <p class="card-text">Medicamentos sumistrados  </p>
                                    <a href="#" class="btn btn-info">Mas detalles</a>
                                </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Citas</h5>
                                    <p class="card-text">Agendar una cita médica  </p>
                                    <a href="#" class="btn btn-info">Mas detalles</a>
                                </div>
                                </div>
                            </div>
                            </div>

                    </div>
                </div>




            </div>
        </div>
    </div>
</div>

   <?php require_once 'footer.php'; ?>

</body  >
</html>

<?php 
    }else{
        header("location:../index.php");
    }
 ?>



<script type="text/javascript">
   
const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});

</script>
