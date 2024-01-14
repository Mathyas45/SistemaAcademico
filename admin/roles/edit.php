<?php

$id_rol = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/roles/rolesShowControlador.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
        <!-- Main content -->
        <div class="container-fluid">
            <br>
            <h1 class="ml-5">Editar Rol: <?= $nombre_rol; ?> </h1>
            <br>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ingresa los datos</h3>

                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL; ?>/app/controladores/roles/rolesUpdateControlador.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Nombre del Rol</label>
                                        <input type="text" value="<?= $nombre_rol;?>" class="form-control text-uppercase" name="nombre_rol" id="nombre_rol" required placeholder="Ingrese el nombre del Rol">
                                        <input type="text" value="<?= $id_rol;?>" hidden class="form-control text-uppercase" name="id_rol" id="id_rol">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                        <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar Rol</button>

                                    </div>

                                </div>
                            </form>


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