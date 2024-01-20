<?php
include('../app/config.php');
include('layout/parte1.php');
include('../app/controladores/roles/rolesListadoControlador.php');
include('../app/controladores/usuarios/usuariosListadoControlador.php');
include('../app/controladores/niveles/nivelesListadoControlador.php');
include('../app/controladores/grados/gradosListadoControlador.php');
include('../app/controladores/materias/materiasListadoControlador.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="container-fluid  ">
        <div class="container-fluid ">
            <div class="row ml-4">
                <h1><?= APP_NAME; ?></h1>
                <br>
            </div>
            <div class="row ml-4">
                <div class="col-lg-3 col-6 ">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador = 0;
                            foreach ($roles as $rol) {
                                $contador++;
                            }
                            ?>
                            <h3><?= $contador ?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fa-solid fa-layer-group"></i></i>
                        </div>
                        <a href="<?= APP_URL; ?>/admin/roles" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 ">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador = 0;
                            foreach ($usuarios as $usuario) {
                                $contador++;
                            }
                            ?>
                            <h3><?= $contador ?></h3>
                            <p>Usuarios registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-people-fill"></i></i>
                        </div>
                        <a href="<?= APP_URL; ?>/admin/usuarios" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 ">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador = 0;
                            foreach ($niveles as $nivel) {
                                $contador++;
                            }
                            ?>
                            <h3><?= $contador ?></h3>
                            <p>Niveles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fas fa-school"></i></i>
                        </div>
                        <a href="<?= APP_URL; ?>/admin/niveles" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6 ">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador = 0;
                            foreach ($grados as $grado) {
                                $contador++;
                            }
                            ?>
                            <h3><?= $contador ?></h3>
                            <p>Grados registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fas fa-school"></i></i>
                        </div>
                        <a href="<?= APP_URL; ?>/admin/niveles" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row ml-4">
                <div class="col-lg-3 col-6 ">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <?php
                            $contador = 0;
                            foreach ($materias as $materias) {
                                $contador++;
                            }
                            ?>
                            <h3><?= $contador ?></h3>
                            <p>Materias registradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-journals"></i></i>
                        </div>
                        <a href="<?= APP_URL; ?>/admin/materias---------" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

</div>

<?php
include('layout/parte2.php');
include('../layout/mensajes.php');

?>