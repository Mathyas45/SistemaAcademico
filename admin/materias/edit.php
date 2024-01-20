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
        <h1 class="ml-4">Atualizar Materia: <?= $nombre_materia ?></h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/materias/materiasUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre_institucion">Nombre de la materia</label>
                                                <input type="text" class="form-control" name="nombre_materia" id="nombre_materia" value="<?=$nombre_materia;?>" placeholder="Nombre de la Materia" required>
                                                <input type="text" class="form-control" name="id_materia" id="id_materia" value="<?=$id_materia;?>" hidden>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger mb-2"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                <button type="submit" class="btn btn-warning mb-2"><i class="bi bi-floppy-fill"></i> Actualizar Materia</button>
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
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>