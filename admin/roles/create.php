<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/roles/RolesListadoControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Crear un nuevo Rol</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?=APP_URL;?>/app/controladores/roles/rolesCreateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Nombre del Rol</label>
                                    <input type="text" class="form-control text-uppercase" name="nombre_rol" id="nombre_rol" required placeholder="Ingrese el nombre del Rol">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar Rol</button>

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