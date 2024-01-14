<?php
//recuperamos el id del buscador por medio de get
$id_rol = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/roles/rolesShowControlador.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Observar Rol: <?= $nombre_rol ?> </h1>


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
                                <label for="">Nombre del Rol</label>
                                <input type="text" value="<?= $nombre_rol; ?>" class="form-control text-uppercase" name="nombre_rol" id="nombre_rol" disabled placeholder="Ingrese el nombre del Rol">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Volver</a>

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