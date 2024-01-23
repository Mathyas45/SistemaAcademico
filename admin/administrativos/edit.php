<?php
$id_administrativo = $_GET['id'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/administrativos/administrativosShowControlador.php');
include('../../app/controladores/roles/RolesListadoControlador.php')
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
                <div class="card card-outline card-warning ">
                    <div class="card-header">
                        <h1 class="">Actualizar Personal administrativo: <?= $nombres . " " . $apellidos; ?> </h1>

                    </div>
                </div>
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edita los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/administrativos/administrativosUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre Rol</label>
                                        <a href="<?= APP_URL ?>/admin/roles/create.php" class="btn-inline-primary"><i class="bi bi-plus"></i>Nuevo Rol</a>
                                        <input type="hidden" name="id_administrativo" value="<?= $id_administrativo; ?>">
                                        <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                                        <input type="hidden" name="id_persona" value="<?= $id_persona; ?>">
                                        
                                        <select class="form-control" name="rol_id">
                                            <?php
                                            foreach ($roles as $rol) { ?>
                                                <option value="<?= $rol['id_rol']; ?>" <?php echo ($rol_id == $rol['id_rol']) ? 'selected="selected"' : ''; ?>>
                                                    <?= $rol['nombre_rol']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control text-uppercase" name="nombres" required placeholder="Ingrese el nombres del usuario" value="<?=$nombres;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" name="apellidos" required placeholder="Ingrese el apellidos del usuario" value="<?=$apellidos;?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="number" class="form-control " name="dni" required placeholder="Ingrese el número de dni" value="<?=$dni;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control " name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="number" class="form-control " name="celular" required placeholder="Ingrese número de celular" value="<?=$celular;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " name="email" required placeholder="Ingrese el correo del usuario" value="<?=$email;?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Profesión</label>
                                        <input type="text" class="form-control " name="profesion"  placeholder="Ingrese la profesion del usuario" value="<?=$profesion;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">dirección</label>
                                        <input type="addres" class="form-control " name="direccion"  placeholder="Ingrese la direccion" value="<?=$direccion;?>">
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
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>