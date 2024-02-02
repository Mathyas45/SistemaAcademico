<?php
$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
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

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h1 class="">Observar Estudiante: <?= $nombre_estudiante . " " . $apellido_estudiante ?></h1>

                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Verifica los datos GENERALES del Estudiante</h3>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <input type="text" class="form-control" value="<?= $rol_estudiante; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" value="<?= $nombre_estudiante; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" class="form-control" value="<?= $apellido_estudiante; ?>" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dni</label>
                                    <input type="text" class="form-control" value="<?= $dni_estudiante; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <input type="text" class="form-control" value="<?= $fecha_nacimiento; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" class="form-control" value="<?= $telefono_estudiante; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="text" class="form-control" value="<?= $email_estudiante; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">dirección</label>
                                    <input type="text" class="form-control" value="<?= $direccion_estudiante; ?>" readonly>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Verifica los datos ACADÉMICOS del Estudiante</h3>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nivel</label>

                                            <input type="text" class="form-control" value="<?= $nivel_estudiante; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            
                                            <input type="text" class="form-control" value="<?= $grado_estudiante." | ".$seccion_estudiante; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <input type="text" class="form-control" value="<?= $codigo_estudiante; ?>" readonly>
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
                                <h3 class="card-title">Verifica los datos del padre de familia</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" class="form-control" value="<?= $nombres_padre; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Dni</label>
                                            <input type="text" class="form-control" value="<?= $dni_padre; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""># de celular</label>
                                            <input type="text" class="form-control" value="<?= $telefono_padre; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Parentesco con el estudiante</label>
                                            <input type="text" class="form-control" value="<?= $parentesco; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" class="form-control" value="<?= $ocupacion_padre; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correo Electrónico</label>
                                            <input type="text" class="form-control" value="<?= $email_padre; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">dirección</label>
                                            <input type="text" class="form-control" value="<?= $direccion_padre; ?>" readonly>
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
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>