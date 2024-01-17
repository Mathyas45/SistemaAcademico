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
        <h1 class="ml-4">Editar Gestión - Periodo Educativo <?= $gestion; ?></h1>
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Actualice los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/configuraciones/gestion/gestionUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre_institucion">Gestión - Periodo educativo</label>
                                                <input type="text" class="form-control" value="<?= $gestion; ?>" name="gestion" id="gestion" placeholder="Nombre de la Institución" required>
                                                <input type="text" class="form-control" value="<?= $id_gestion; ?>" name="id_gestion" hidden>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_institucion">Estado</label>
                                                <select class="form-control" name="estado" id="estado">
                                                    <?php
                                                    if ($estado == 1) { ?>
                                                        <option value="1">ACTIVO</option>
                                                        <option value="0">INACTIVO</option>
                                                    <?php
                                                    } else { ?>
                                                        <option value="0">INACTIVO</option>
                                                        <option value="1">ACTIVO</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger mb-2"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                <button type="submit" class="btn btn-warning mb-2"><i class="bi bi-floppy-fill"></i> Actualizar Gestion</button>
                            </div>

                        </form>
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