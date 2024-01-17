<?php
$id_gestion = $_GET['id'];
include('../../../app/config.php');
include('../../layout/parte1.php');
include('../../../app/controladores/configuraciones/gestion/gestionShowControlador.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Registro de Nueva Gestión - Periodo Educativo: <?= $gestion; ?></h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Obverve los datos</h3>

                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre_institucion">Gestión - Periodo educativo</label>
                                                <input type="text" class="form-control" name="gestion" value="<?= $gestion; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_institucion">Fecha de Creación</label>
                                                <input type="text" class="form-control" name="gestion" value="<?= $fyh_creacion; ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_institucion">Estado</label>
                                                <br>
                                                <?php
                                                if ($estado == 1) {
                                                    echo "ACTIVO";
                                                } else {
                                                    echo "INACTIVO";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger mb-2"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-floppy-fill"></i> Guardar Gestion</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.container-fluid -->


<?php
include('../../layout/parte2.php');
include('../../../layout/mensajes.php');

?>