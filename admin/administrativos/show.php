<?php
$id_administrativo = $_GET['id'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/administrativos/administrativosShowControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="card card-outline card-success ">
                    <div class="card-header">
                        <h1 class="">Datos del Personal administrativo: <?= $nombres ." ". $apellidos;?> </h1>

                    </div>
                </div>
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Observa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/administrativos/administrativosCreateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Rol</label>
                                        <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn-inline-primary"><i class="bi bi-plus"></i>Nuevo Rol</a>

                                        <input type="text" class="form-control text-uppercase" name="nombres" value="<?=$nombre_rol;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control text-uppercase" name="nombres" value="<?=$nombres;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" name="apellidos" value="<?=$apellidos;?>" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="number" class="form-control " name="dni" value="<?=$dni;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="text" class="form-control " name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="number" class="form-control " name="celular" value="<?=$celular;?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " name="email" value="<?=$email;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Profesión</label>
                                        <input type="text" class="form-control " name="profesion" value="<?=$profesion;?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha y hora de registro</label>
                                        <input type="text" class="form-control " name="profesion" value="<?=$fyh_creacion;?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">dirección</label>
                                        <input type="addres" class="form-control " name="direccion" value="<?=$direccion;?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>