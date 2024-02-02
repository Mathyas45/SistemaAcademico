<?php
include('../../app/config.php');
include('../layout/parte1.php');
// include('../../app/controladores/docentes/docentesListadoControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-outline card-primary ">
                    <div class="card-header">
                        <h1 class="ml-4">Inscripciones: <?= $anioActual?></h1>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary"><i class="bi bi-person-check-fill"></i></span>
                            <div class="info-box-content">
                                <h1 class="info-box-text">Inscripción de estudiantes</h1>
                                <a class="btn btn-primary" href="create.php">Ir</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="bi bi-calendar2-range"></i></span>
                            <div class="info-box-content">
                                <h1 class="info-box-text">Periodos de la institución</h1>
                                <a class="btn btn-info" href="gestion">Ir a la configuración</a>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>
<script>

</script>