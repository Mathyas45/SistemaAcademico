<?php
include('../../../app/config.php');
include('../../layout/parte1.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Registro de Nueva Gestión - Periodo Educativo</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/configuraciones/gestion/gestionCreateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre_institucion">Gestión - Periodo educativo</label>
                                                <input type="text" class="form-control" name="gestion" id="gestion" placeholder="Nombre de la Institución" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_institucion">Estado</label>
                                                <select class="form-control" name="estado" id="estado">
                                                    <option value="1">ACTIVO</option>
                                                    <option value="0">INACTIVO</option>
                                                </select>
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