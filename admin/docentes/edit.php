<?php
$id_docente = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/docentes/docentesShowControlador.php');

include('../../app/controladores/roles/RolesListadoControlador.php');
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
                        <h1 class="">Actualizar Docente: <?= $nombres . " " . $apellidos ?></h1>

                    </div>
                </div>
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edita los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/docentes/docentesUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="">Rol</label>
                                        <input type="text" name="id_docente" value="<?= $id_docente ?>" hidden>
                                        <input type="text" name="id_usuario" value="<?= $id_usuario ?>" hidden>
                                        <input type="text" name="id_persona" value="<?= $id_persona ?>" hidden>
                                        <select class="form-control">
                                            <?php
                                            foreach ($roles as $rol) {
                                            ?>
                                                <option disabled value="<?= $rol['id_rol']; ?>" <?= $rol['nombre_rol'] == 'Docente' ? 'selected' : ''; ?>>
                                                    <?= $rol['nombre_rol']; ?>
                                                </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                        <select class="form-control" name="rol_id" hidden>
                                            <?php
                                            foreach ($roles as $rol) {
                                            ?>
                                                <option value="<?= $rol['id_rol']; ?>" <?= $rol['nombre_rol'] == 'Docente' ? 'selected' : ''; ?>>
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
                                        <input type="text" class="form-control text-uppercase" name="nombres" value="<?= $nombres ?>" required placeholder="Ingrese el nombres del usuario">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" name="apellidos" value="<?= $apellidos ?>" required placeholder="Ingrese el apellidos del usuario">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="number" class="form-control " name="dni" value="<?= $dni ?>" required placeholder="Ingrese el número de dni">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control " value="<?= $fecha_nacimiento ?>" name="fecha_nacimiento">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="number" class="form-control " value="<?= $celular ?>" name="celular" required placeholder="Ingrese número de celular">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " value="<?= $email ?>" name="email" required placeholder="Ingrese el correo del personal">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Profesión</label>
                                        <input type="text" class="form-control" value="<?= $profesion ?>" name="profesion" placeholder="Ingrese la profesion del personal">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cursos especialidad</label>
                                        <input type="text" class="form-control" value="<?= $especialidad ?>" name="especialidad" placeholder="Ingrese los cursos que enseña el docente">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">dirección</label>
                                        <input type="addres" class="form-control" value="<?= $direccion ?>" name="direccion" placeholder="Ingrese la direccion">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Antiguedad</label>
                                        <input type="number" class="form-control" value="<?= $antiguedad ?>" name="antiguedad" placeholder="Ingrese los años de antiguedad">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar Docente</button>
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