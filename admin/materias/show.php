<?php
$id_materia = $_GET['id'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/materias/materiasShowControlador.php')

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Verifica la materia: <?= $nombre_materia; ?></h1>
        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Oberva los datos</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_institucion">Nombre de la materia</label>
                                    <input type="text" class="form-control" value="<?= $nombre_materia; ?>" disabled>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_institucion">Fecha de creación</label>
                                    <input type="text" class="form-control" value="<?= $fyh_creacion; ?>" disabled>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                        <hr>
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="index.php" class="btn btn-danger "><i class="bi bi-x-circle-fill"></i> Volver</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>