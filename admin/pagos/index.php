<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/estudiantes/estudiantesListadoControlador.php')
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
                        <h1 class="ml-4">Listado de Estudiantes</h1>

                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Estudiantes Registrados</h3>
                  
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-resposive table-striped table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Datos Completos</th>
                                    <th>#Dni</th>
                                    <th>F.Nacimiento</th>
                                    <th>E-mail</th>
                                    <th>#celular</th>
                                    <th>Nivel</th>
                                    <th>Grado</th>
                                    <th>estado</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($estudiantes as $estudiante) {
                                    $id_estudiante = $estudiante['id_estudiante'];
                                ?>
                                    <tr>
                                        <td><?= $contador++; ?></td>
                                        <td><?= $estudiante['nombres'] ." ".$estudiante['apellidos'];?></td>
                                        <td><?= $estudiante['dni']; ?></td>
                                        <td><?= $estudiante['fecha_nacimiento']; ?></td>
                                        <td><?= $estudiante['email']; ?></td>
                                        <td><?= $estudiante['celular']; ?></td>
                                        <td><?= $estudiante['nivel']; ?></td>
                                        <td><?= $estudiante['curso']." ".$estudiante['seccion'];?></td>
                                        <td>
                                            <center>
                                                <?php
                                                if ($estudiante['estado'] == 1) { ?>
                                                    <button class="btn btn-success" style="border-radius: 20px;">Activo</button>
                                                <?php
                                                } else { ?>
                                                    <button class="btn btn-danger" style="border-radius: 20px;">Inactivo</button>
                                                <?php
                                                }
                                                ?>
                                            </center>
                                        </td>

                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="contrato.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-warning"><i class="bi bi-printer"></i> Imprimir</a>
                                                    <a href="create.php?id=<?= $id_estudiante; ?>" type="button" class="btn btn-success"><i class="bi bi-cash-coin"></i> Pagar</a>
                                                    
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
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>
<script>
    function confirmarEliminacion(id_estudiante) {
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
                window.location.href = "delete.php?id_estudiante=" + id_estudiante;
            }
        });
        return false; // Evita el comportamiento predeterminado del enlace
    }
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_  Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0  Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total  Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_  Estudiantes",
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