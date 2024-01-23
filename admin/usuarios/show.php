<?php
//recuperamos el id del buscador por medio de get
$id_usuario = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/usuarios/usuariosShowControlador.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Observar Usuario: <?= $email; ?> </h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Datos Registrados</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre Rol</label>
                                    <input type="text" class="form-control text-uppercase" name="rol" value="<?= $nombre_rol; ?>" disabled>

                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" class="form-control " name="email" disabled value=" <?= $email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de Creación</label>
                                    <input type="email" class="form-control " name="email" disabled value=" <?= $fyh_creacion ?>">
                                </div>
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