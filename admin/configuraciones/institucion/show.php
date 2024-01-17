<?php
$id_config_institucion = $_GET['id'];

include('../../../app/config.php');
include('../../layout/parte1.php');
include('../../../app/controladores/configuraciones/institucion/institucionShowControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Observa los datos de la Institución: <?= $nombre_institucion; ?></h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Verifica los datos</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre_institucion">Nombre de la Institución</label>
                                            <input type="text" class="form-control" name="nombre_institucion" id="nombre_institucion" value="<?= $nombre_institucion; ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la Dirección" value="<?= $direccion; ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="number" class="form-control" name="telefono" id="telefono" value="<?= $telefono; ?>" disabled>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="celular">Celular</label>
                                        <input type="number" class="form-control" name="celular" id="celular" value="<?= $celular; ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12 ml-5">
                                            <center> <label for="logo">Logo</label></center>
                                            <div class="custom-file mb-3">

                                                <center>
                                                    <img src="<?= APP_URL . "/public/images/configuracion/" . $logo; ?>" width="200px" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 d-flex justify-content-between">
                        <a href="index.php" class="btn btn-danger mb-2"><i class="bi bi-x-circle-fill"></i> Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../../layout/parte2.php');
include('../../../layout/mensajes.php');

?>