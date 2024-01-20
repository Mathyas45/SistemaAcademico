<?php
$id_grado = $_GET['id'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/grados/gradosShowControlador.php')

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Verifica el Grado: <?= $curso . " " . $seccion; ?></h1>
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
                                    <label for="nombre_institucion">Nivel</label>
                                    <input type="text" class="form-control" value="<?= $nivel; ?>" disabled>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Grados</label>
                                    <input type="text" class="form-control" value="<?= $curso; ?>" disabled>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Sección</label>
                                    <input type="text" class="form-control" value="<?= $seccion; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Turno</label>
                                    <input type="text" class="form-control" value="<?= $turno; ?>" disabled>
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