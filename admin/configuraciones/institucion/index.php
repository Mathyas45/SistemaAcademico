<?php
include('../../../app/config.php');
include('../../layout/parte1.php');
include('../../../app/controladores/configuraciones/institucion/institucionListadoControlador.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>
        <h1 class="ml-4">Listado de Instituciones</h1>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Instituciones Registradas</h3>
                        <div class="card-tools">
                            <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Crear nueva Instituciones</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-resposive table-striped table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre de la institución</th>
                                    <th>Logo</th>
                                    <th>Direccion</th>
                                    <th>telefono</th>
                                    <th>Celular</th>
                                    <th>E-mail</th>
                                    <th>Fecha de creación</th>
                                    <th>Estado</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($instituciones as $institucion) {
                                    $id_config_institucion = $institucion['id_config_institucion'];
                                ?>
                                    <tr>
                                        <td><?= $contador++; ?></td>
                                        <td><?= $institucion['nombre_institucion']; ?></td>
                                        <td>
                                            <img src="<?= APP_URL . "/public/images/configuracion/" . $institucion['logo']; ?>" width="100px" alt="">
                                        </td>
                                        <td><?= $institucion['direccion']; ?></td>
                                        <td><?= $institucion['telefono']; ?></td>
                                        <td><?= $institucion['celular']; ?></td>
                                        <td><?= $institucion['email']; ?></td>
                                        <td><?= $institucion['fyh_creacion']; ?></td>
                                        <td><?php
                                            if ($institucion['estado'] == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                        ?>
                                            
                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="show.php?id=<?= $id_config_institucion; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-eye-fill"></i> Ver</a>
                                                    <a href="edit.php?id=<?= $id_config_institucion; ?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
                                                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(<?php echo $id_config_institucion; ?>);">
                                                        <i class="bi bi-trash3-fill"></i> Eliminar
                                                    </a>

                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>



                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<?php
include('../../layout/parte2.php');
include('../../../layout/mensajes.php');

?>
<script>
    function confirmarEliminacion(id_config_institucion) {
        Swal.fire({
            title: "¿Seguro que desea eliminar?",
            icon: "question",
            iconHtml: "?",
            cancelButtonText: "No",
            confirmButtonText: "Sí",
            showCancelButton: true,
            showCloseButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirecciona al archivo que maneja la eliminación
                window.location.href = "delete.php?id_config_institucion=" + id_config_institucion;
            }
        });
        return false; // Evita el comportamiento predeterminado del enlace
    }
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Instituciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Instituciones)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Instituciones",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed one-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>