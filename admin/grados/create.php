<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/niveles/nivelesListadoControlador.php')

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Registro de un nuevo Grado</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/grados/gradosCreateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre_institucion">Nivel</label>
                                        <select class="form-control" name="nivel_id" id="nivel_id">
                                            <?php
                                            foreach ($niveles as $nivel) {
                                            ?>
                                                <option value="<?= $nivel['id_nivel']; ?>"><?= $nivel['nivel'] . " - " . $nivel['turno']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Grados</label>
                                        <select class="form-control" name="curso" id="curso">
                                            <option value="INICIAL">INICIAL</option>
                                            <option value="1° primaria">1° primaria</option>
                                            <option value="2° primaria">2° primaria</option>
                                            <option value="3° primaria">3° primaria</option>
                                            <option value="4° primaria">4° primaria</option>
                                            <option value="5° primaria">5° primaria</option>
                                            <option value="6° primaria">6° primaria</option>
                                            <option value="1° secundaria">1° secundaria</option>
                                            <option value="2° secundaria">2° secundaria</option>
                                            <option value="3° secundaria">3° secundaria</option>
                                            <option value="4° secundaria">4° secundaria</option>
                                            <option value="5° secundaria">5° secundaria</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Sección</label>
                                        <select class="form-control" name="seccion" id="seccion">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger "><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary "><i class="bi bi-floppy-fill"></i> Guardar Gestion</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>