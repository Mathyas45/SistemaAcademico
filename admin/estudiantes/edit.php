<?php
include('../../app/config.php');
include('../layout/parte1.php');

$id_estudiante = $_GET['id'];

include('../../app/controladores/roles/RolesListadoControlador.php');
include('../../app/controladores/niveles/nivelesListadoControlador.php');
include('../../app/controladores/grados/gradosListadoControlador.php');

include('../../app/controladores/estudiantes/estudiantesShowControlador.php');
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
                <form action="<?= APP_URL; ?>/app/controladores/estudiantes/estudiantesUpdateControlador.php" method="post">

                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h1 class=""> Actualizar Estudiante</h1>

                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edita los datos GENERALES del estudiante</h3>

                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                        <input type="text" name="id_estudiante" value="<?=$id_estudiante;?>" hidden>
                                        <input type="text" name="id_persona" value="<?=$id_persona;?>" hidden>
                                        <input type="text" name="id_padres_familia" value="<?=$id_padres_familia;?>" hidden>

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

                                        <input type="text" class="form-control text-uppercase" name="nombres" value="<?= $nombre_estudiante ?>" required placeholder="Ingrese los nombres del estudiante">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" name="apellidos" value="<?= $apellido_estudiante ?>" required placeholder="Ingrese los apellidos del estudiante">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="number" class="form-control " name="dni" value="<?= $dni_estudiante ?>" required placeholder="Ingrese el número de dni">
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
                                        <input type="number" class="form-control " name="celular" value="<?= $telefono_estudiante ?>" required placeholder="Ingrese número de celular">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="email" class="form-control " name="email" value="<?= $email_estudiante ?>" required placeholder="Ingrese el correo del personal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">dirección</label>
                                        <input type="addres" class="form-control " name="direccion" value="<?= $direccion_estudiante ?>" placeholder="Ingrese la direccion">
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Edita los datos ACADÉMICOS del Estudiante</h3>

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

                                                        <option value="<?= $nivel['id_nivel']; ?>" <?= $nivel['id_nivel'] == $nivel_id ? 'selected' : ''; ?>>
                                                            <?= $nivel['nivel']; ?>
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
                                                     
                                                        
                                                        <option value="<?= $grado['id_grado']; ?>" <?= $grado['id_grado'] == $grado_id ? 'selected' : ''; ?>>
                                                            <?= $grado['curso'].' | '. $grado['seccion']; ?>
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
                                                <input type="text" class="form-control text-uppercase" value="<?= $codigo_estudiante ?>" name="codigo" required placeholder="Ingrese el código del estudiante">
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
                                    <h3 class="card-title">Edita los datos del padre de familia</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres y Apellidos</label>
                                                <input type="text" class="form-control text-uppercase" value="<?= $nombres_padre ?>" name="nombres_apellidosPF" required placeholder="Ingrese los nombres y apellidos del padre de familia">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Dni</label>
                                                <input type="number" class="form-control " name="dniPF" value="<?= $dni_padre ?>" required placeholder="Ingrese el número de dni del padre de familia">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""># de celular</label>
                                                <input type="number" class="form-control " name="celularPF" value="<?= $telefono_padre ?>" required placeholder="Ingrese el número de celular">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Parentesco con el estudiante</label>
                                                <input type="text" class="form-control " name="parentesco" value="<?= $parentesco ?>" required placeholder="Ingrese el parentesco que tiene con el estudiante">
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">Ocupación</label>
                                                <input type="text" class="form-control " name="ocupacion" value="<?= $ocupacion_padre ?>" required placeholder="Ingrese la ocupación del padre de familia">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Correo Electrónico</label>
                                                <input type="email" class="form-control " name="emailPF" value="<?= $email_padre ?>"  placeholder="Ingrese el correo del padre de familia">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">dirección</label>
                                                <input type="addres" class="form-control " name="direccionPF" value="<?= $direccion_padre ?>" placeholder="Ingrese la direccion">
                                            </div>
                                        </div>


                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar Estudiante</button>
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