<?php

$id_usuario = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/usuarios/usuariosShowControlador.php');
//traemos el show roles para listar los roles en el select
include('../../app/controladores/roles/rolesListadoControlador.php')


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-5">Editar Usuario: <?= $nombres; ?> </h1>
        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edita los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/usuarios/usuariosUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Rol</label>
                                        <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn-inline-primary"><i class="bi bi-plus"></i>Nuevo Rol</a>

                                        <select class="form-control" name="rol_id">
                                            <?php
                                            foreach ($roles as $role) {
                                                $nombre_rol_usuario = $role['nombre_rol']; ?>
                                                <option value="<?= $role['id_rol']; ?>" <?php if ($nombre_rol == $nombre_rol_usuario) { ?> selected="selected" <?php } ?> { # code... } ?> <?= $role['nombre_rol']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Completo del usuario</label>
                                        <input type="text" class="form-control text-uppercase" name="nombres" required value="<?= $nombres?>">
                                        <!-- Rescatamos el id usuario que viene desde el get(buscador) para pasarlo al controlador y sepa que usuario actualizar -->
                                        <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control" name="email" required value="<?= $email?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" class="form-control " name="password"  placeholder="Escriba solo si desea actualizar la contraseña">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Repetir Contraseña</label>
                                        <input type="text" class="form-control " name="password_repeat"  placeholder="Repita la contraseña solo si desea actualizar">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar Usuario</button>

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