<?php
$id_grado = $_GET['id'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/grados/gradosShowControlador.php');
include('../../app/controladores/niveles/nivelesListadoControlador.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Actualizar Grado: <?= $curso . '-' . $seccion ?></h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edita los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/grados/gradosUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre_institucion">Nivel</label>
                                        <input type="hidden" name="id_grado" value="<?= $id_grado; ?>">
                                        <select class="form-control" name="nivel_id" id="nivel_id">
                                            <?php foreach ($niveles as $nivel) : ?>
                                                <?php if ($nivel['estado'] == 1) : ?>
                                                    <option value="<?= $nivel['id_nivel']; ?>" <?php echo ($nivel_id == $nivel['id_nivel']) ? 'selected="selected"' : ''; ?>>
                                                        <?= $nivel['nivel'] . " - " . $nivel['turno']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Grados</label>
                                        <select class="form-control" name="curso" id="curso">
                                            <option value="INICIAL" <?= ($curso == 'INICIAL') ? 'selected="selected"' : '' ?>>INICIAL</option>
                                            <option value="1° primaria" <?= ($curso == '1° primaria') ? 'selected="selected"' : '' ?>>1° primaria</option>
                                            <option value="2° primaria" <?= ($curso == '2° primaria') ? 'selected="selected"' : '' ?>>2° primaria</option>
                                            <option value="3° primaria" <?= ($curso == '3° primaria') ? 'selected="selected"' : '' ?>>3° primaria</option>
                                            <option value="4° primaria" <?= ($curso == '4° primaria') ? 'selected="selected"' : '' ?>>4° primaria</option>
                                            <option value="5° primaria" <?= ($curso == '5° primaria') ? 'selected="selected"' : '' ?>>5° primaria</option>
                                            <option value="6° primaria" <?= ($curso == '6° primaria') ? 'selected="selected"' : '' ?>>6° primaria</option>
                                            <option value="1° secundaria" <?= ($curso == '1° secundaria') ? 'selected="selected"' : '' ?>>1° secundaria</option>
                                            <option value="2° secundaria" <?= ($curso == '2° secundaria') ? 'selected="selected"' : '' ?>>2° secundaria</option>
                                            <option value="3° secundaria" <?= ($curso == '3° secundaria') ? 'selected="selected"' : '' ?>>3° secundaria</option>
                                            <option value="4° secundaria" <?= ($curso == '4° secundaria') ? 'selected="selected"' : '' ?>>4° secundaria</option>
                                            <option value="5° secundaria" <?= ($curso == '5° secundaria') ? 'selected="selected"' : '' ?>>5° secundaria</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Sección</label>
                                        <select class="form-control" name="seccion" id="seccion">
                                            <option value="A" <?= ($seccion == 'A') ? 'selected="selected"' : '' ?>>A</option>
                                            <option value="B" <?= ($seccion == 'B') ? 'selected="selected"' : '' ?>>B</option>
                                            <option value="C" <?= ($seccion == 'C') ? 'selected="selected"' : '' ?>>C</option>
                                            <option value="D" <?= ($seccion == 'D') ? 'selected="selected"' : '' ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger "><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                <button type="submit" class="btn btn-warning "><i class="bi bi-floppy-fill"></i> Actualizar Gestion</button>
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