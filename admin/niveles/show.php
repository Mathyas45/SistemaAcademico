<?php
//recuperamos el id del buscador por medio de get
$id_nivel = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/niveles/nivelesShowControlador.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Observar Nivel: <?= $nivel ?> </h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Datos Registrados</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Gestión - Periodo Educativo</label>
                                    <input type="text" class="form-control" value="<?= $gestion; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Niveles</label>
                                    <input type="text" class="form-control" value="<?= $nivel; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Turnos</label>
                                    <input type="text" class="form-control" value="<?= $turno; ?>" disabled>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha y Hora de creación</label>
                                    <input type="text" class="form-control" value="<?= $fyh_creacion; ?>" disabled>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_institucion">Estado</label>
                                    <br>
                                    <?php
                                    if ($estado == 1) { ?>
                                        <input type="text" class="form-control" value="<?php echo "ACTIVO"; ?>" disabled>
                                    <?php
                                    } else { ?>
                                        <input type="text" class="form-control" value="<?= "INACTIVO"; ?>" disabled>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between mb-2 ml-2">
                            <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Volver</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>
<script>
</script>