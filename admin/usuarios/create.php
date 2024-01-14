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
        <h1 class="ml-4">Crear un nuevo Usuario</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/usuarios/usuariosCreateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Rol</label>
                                        <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn-inline-primary"><i class="bi bi-plus"></i>Nuevo Rol</a>

                                        <select class="form-control" name="rol_id">
                                            <?php
                                            foreach ($roles as $role) { ?>
                                                <option value="<?= $role['id_rol']; ?>"> <?= $role['nombre_rol']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Completo del usuario</label>
                                        <input type="text" class="form-control text-uppercase" name="nombres" required placeholder="Ingrese el nombre del usuario">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " name="email"  required placeholder="Ingrese el correo del usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" class="form-control " name="password"  required placeholder="Ingrese la contraseña del usuario">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Repetir Contraseña</label>
                                        <input type="text" class="form-control " name="password_repeat" required placeholder="Repita la contraseña del usuario">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar Usuario</button>

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