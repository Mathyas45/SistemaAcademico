<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/roles/RolesListadoControlador.php');
include('../../app/controladores/niveles/nivelesListadoControlador.php');
include('../../app/controladores/grados/gradosListadoControlador.php');

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
                <form action="<?= APP_URL; ?>/app/controladores/inscripciones/inscripcionesCreateControlador.php" method="post">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h1 class="">Registro de un nuevo Estudiante</h1>

                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ingresa los datos GENERALES del estudiante</h3>

                        </div>
                        <div class="card-body">
                            <!-- <form action="<?= APP_URL; ?>/app/controladores/inscripciones/inscripcionesCreateControlador.php" method="post"> -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rol</label>

                                        <select class="form-control">
                                            <?php
                                            foreach ($roles as $rol) {
                                            ?>
                                                <option disabled value="<?= $rol['id_rol']; ?>" <?= $rol['nombre_rol'] == 'ESTUDIANTE' ? 'selected' : ''; ?>>
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
                                                <option value="<?= $rol['id_rol']; ?>" <?= $rol['nombre_rol'] == 'ESTUDIANTE' ? 'selected' : ''; ?>>
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
                                        <input type="text" class="form-control text-uppercase" name="nombres" required placeholder="Ingrese los nombres del estudiante">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" name="apellidos" required placeholder="Ingrese los apellidos del estudiante">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="number" class="form-control " name="dni" required placeholder="Ingrese el número de dni">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control " name="fecha_nacimiento">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="number" class="form-control " name="celular" required placeholder="Ingrese número de celular">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " name="email" required placeholder="Ingrese el correo del personal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">dirección</label>
                                        <input type="addres" class="form-control " name="direccion" placeholder="Ingrese la direccion">
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Ingresa los datos ACADÉMICOS del Estudiante</h3>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nivel</label>

                                                <select class="form-control" name="nivel_id">
                                                    <?php
                                                    foreach ($niveles as $nivel) {
                                                    ?>
                                                        <option value="<?= $nivel['id_nivel']; ?>">
                                                            <?= $nivel['nivel'] . " - " . $nivel['turno']; ?>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Grado</label>
                                                <select class="form-control" name="grado_id">
                                                    <?php
                                                    foreach ($grados as $grado) {
                                                    ?>
                                                        <option value="<?= $grado['id_grado']; ?>">
                                                            <?= $grado['curso'] . "|Seccion " . $grado['seccion']; ?>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Código</label>
                                                <input type="text" class="form-control text-uppercase" name="codigo" required placeholder="Ingrese el código del estudiante">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Ingresa los datos del padre de familia</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres y Apellidos</label>
                                                <input type="text" class="form-control text-uppercase" name="nombres_apellidosPF" required placeholder="Ingrese los nombres y apellidos del padre de familia">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Dni</label>
                                                <input type="number" class="form-control " name="dniPF" required placeholder="Ingrese el número de dni del padre de familia">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""># de celular</label>
                                                <input type="number" class="form-control " name="celularPF" required placeholder="Ingrese el número de celular">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Parentesco con el estudiante</label>
                                                <input type="text" class="form-control " name="parentesco" required placeholder="Ingrese el parentesco que tiene con el estudiante">
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">Ocupación</label>
                                                <input type="text" class="form-control " name="ocupacion" required placeholder="Ingrese la ocupación del padre de familia">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Correo Electrónico</label>
                                                <input type="email" class="form-control " name="emailPF" required placeholder="Ingrese el correo del personal">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">dirección</label>
                                                <input type="addres" class="form-control " name="direccionPF" placeholder="Ingrese la direccion">
                                            </div>
                                        </div>


                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar Estudiante</button>
                                        </div>
                                    </div>
                </form>
            </div>

        </div>
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