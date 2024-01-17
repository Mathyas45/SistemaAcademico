<?php
$id_nivel = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/configuraciones/gestion/gestionListadoControlador.php');
include('../../app/controladores/niveles/nivelesShowControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Actualizar Nivel</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edita los datos</h3>

                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/niveles/nivelesUpdateControlador.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Gestión - Periodo Educativo</label>
                                        <input type="text" name="id_nivel" value="<?= $id_nivel; ?>" hidden>
                                        <select name="gestion_id" id="gestion_id" class="form-control">

                                            <?php foreach ($gestiones as $gestion) : ?>
                                                <?php if ($gestion['estado'] == 1) : ?>
                                                    <option value="<?= $gestion['id_gestion']; ?>" <?php echo ($gestion_id == $gestion['id_gestion']) ? 'selected="selected"' : ''; ?>>
                                                        <?= $gestion['gestion']; ?>
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
                                        <label for="">Niveles</label>
                                        <select name="nivel" id="" class="form-control">
                                            <option value="INICIAL" <?= ($nivel == 'INICIAL') ? 'selected="selected"' : '' ?>>INICIAL</option>
                                            <option value="PRIMARIA" <?= ($nivel == 'PRIMARIA') ? 'selected="selected"' : '' ?>>PRIMARIA</option>
                                            <option value="SECUNDARIA" <?= ($nivel == 'SECUNDARIA') ? 'selected="selected"' : '' ?>>SECUNDARIA</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Turnos</label>
                                        <select name="turno" id="" class="form-control">
                                            <option value="MAÑANA" <?= ($turno == 'MAÑANA') ? 'selected="selected"' : '' ?>>MAÑANA</option>
                                            <option value="TARDE" <?= ($turno == 'TARDE') ? 'selected="selected"' : '' ?>>TARDE</option>
                                            <option value="NOCHE" <?= ($turno == 'NOCHE') ? 'selected="selected"' : '' ?>>NOCHE</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="index.php" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Actualizar Nivel</button>

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