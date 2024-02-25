<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/docentes/docentesAsignacionesListado.php')
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-outline card-primary ">
                    <div class="card-header">
                        <h1 class="ml-4">Grados Asignados para reporte de notas</h1>

                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Asignaturas Registradas</h3>

                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-resposive table-striped table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nivel</th>
                                    <th>Turno</th>
                                    <th>Grado</th>
                                    <th>Sección</th>
                                    <th>Materia</th>
                                    <th>estado</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($asignaciones as $asignacion) {
                                    $id_grado = $asignacion['id_grado'];

                                    if ($email_sesion == $asignacion['email']) {
                                ?>
                                        <tr>
                                            <td><?php echo $contador++; ?></td>
                                            <td><?php echo $asignacion['nivel']; ?></td>
                                            <td><?php echo $asignacion['turno']; ?></td>
                                            <td><?php echo $asignacion['curso']; ?></td>
                                            <td><?php echo $asignacion['seccion']; ?></td>
                                            <td><?php echo $asignacion['nombre_materia']; ?></td>
                                            <td>
                                                <center>
                                                    <?php
                                                    if ($asignacion['estado'] == 1) { ?>
                                                        <button class="btn btn-success" style="border-radius: 20px;">Activo</button>
                                                    <?php
                                                    } else { ?>
                                                        <button class="btn btn-danger" style="border-radius: 20px;">Inactivo</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </center>
                                            </td>
                                            <td style="text-align: center;">
                                            <!-- //mandamos todois los ids aprovechando que en la tbl asignacion hay estos ids -->
                                                <a href="create.php?id_grado=<?= $id_grado; ?>&&id_docente=<?=$asignacion['docente_id'];?>&&id_materia=<?=$asignacion['materia_id'];?> " class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i> Subir Notas</a>
                                            </td>

                                        </tr>
                                <?php
                                    }
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
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>
<script>
    function confirmarEliminacion(id_docente) {
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
                window.location.href = "delete.php?id_docente=" + id_docente;
            }
        });
        return false; // Evita el comportamiento predeterminado del enlace
    }
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  Docentes",
                "infoEmpty": "Mostrando 0 a 0 de 0  Docentes",
                "infoFiltered": "(Filtrado de _MAX_ total  Docentes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  Docentes",
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