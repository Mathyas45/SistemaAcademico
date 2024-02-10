<?php
$id_config_institucion = $_GET['id'];

include('../../../app/config.php');
include('../../layout/parte1.php');
include('../../../app/controladores/configuraciones/institucion/institucionShowControlador.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Editar los datos de la Institución: <?= $nombre_Institucion ?></h1>
        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingresa los datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= APP_URL; ?>/app/controladores/configuraciones/institucion/institucionUpdateControlador.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre_institucion">Nombre de la Institución</label>
                                                <input type="text" class="form-control" name="nombre_Institucion" id="nombre_Institucion" value="<?= $nombre_Institucion; ?>" placeholder="Nombre de la Institución" required>
                                                <input type="text" class="form-control" name="id_config_institucion" id="id_config_institucion" value="<?= $id_config_institucion; ?>" hidden >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $direccion; ?>" placeholder="Ingrese la Dirección" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telefono">Teléfono</label>
                                                <input type="number" class="form-control" name="telefono" id="telefono" value="<?= $telefono; ?>" placeholder="Ingrese el Teléfono">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="celular">Celular</label>
                                            <input type="number" class="form-control" name="celular" id="celular" value="<?= $celular; ?>" placeholder="Ingrese el número Celular" required>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?= $email; ?>" placeholder="Ingrese el E-mail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="logo">Logo</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" name="logo" id="logo">
                                                <label class="custom-file-label" for="logo">Seleccionar Archivo</label>
                                                <input type="text" name="logo" value="<?= $logo; ?>" hidden>
                                                <center>
                                                    <output id="list">
                                                        <img src="<?= APP_URL . "/public/images/configuracion/" . $logo; ?>" width="200px" alt="" class="mt-3">
                                                    </output>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <hr>
                    <div class="col-md-12 d-flex justify-content-between">
                        <a href="index.php" class="btn btn-danger mb-2"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary mb-2"><i class="bi bi-floppy-fill"></i> Actualizar Rol</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<?php
include('../../layout/parte2.php');
include('../../../layout/mensajes.php');

?>

<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('logo').addEventListener('change', archivo, false);
</script>