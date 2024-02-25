<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/docentes/docentesAsignacionesListado.php');
include('../../app/controladores/estudiantes/estudiantesListadoControlador.php');
include('../../app/controladores/kardex/kardexListadoControlador.php');


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
                        <h1 class="ml-4">Grados Asignados para reporte de incidencias</h1>

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
                                    $docente_id = $asignacion['docente_id'];
                                    $id_grado = $asignacion['id_grado'];

                                    if ($email_sesion == $asignacion['email']) {
                                        $id_asignacion = $asignacion['id_asignacion'];
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
                                            <center>
                                                <td>
                                                    <center>
                                                        <!-- //mandamos todois los ids aprovechando que en la tbl asignacion hay estos ids -->
                                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $id_asignacion; ?>">
                                                            <i class="fas fa-edit"></i> Reportar Incidencia</a>
                                                    </center>

                                                    <!-- Modal -->
                                                </td>
                                                <div class="modal fade" id="exampleModal<?= $id_asignacion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Reporten de Incidencias del grado: <?= $asignacion['curso'] ?></h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= APP_URL ?>/app/controladores/kardex/kardexCreateControlador.php">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Fecha del Reporte</label>
                                                                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                                                                                <input type="text" name="docente_id" id="docente_id" value="<?= $docente_id ?>" hidden>

                                                                                <label>Estudiante</label>
                                                                                <select class="form-control" name="estudiante_id" id="estudiante_id" required>
                                                                                    <option value="">Seleccione un estudiante</option>
                                                                                    <?php
                                                                                    foreach ($estudiantes as $estudiante) {
                                                                                        if ($estudiante['grado_id'] == $asignacion['grado_id']) {

                                                                                            $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                                            <option value="<?= $id_estudiante ?>"><?= $estudiante['apellidos'] . ' ' . $estudiante['nombres'] ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <label>Materia</label>
                                                                                <input type="text" name="" class="form-control" value="<?= $asignacion['nombre_materia'] ?>" readonly>
                                                                                <input type="text" name="materia_id" value="<?= $asignacion['materia_id'] ?> " hidden>

                                                                                <label>Observación</label>
                                                                                <select class="form-control" name="observacion" id="observacion">
                                                                                    <option value="">Seleccione una observación</option>
                                                                                    <option value="Falta de respeto">Falta de respeto</option>
                                                                                    <option value="Falta de puntualidad">Falta de puntualidad</option>
                                                                                    <option value="Falta de responsabilidad">Falta de responsabilidad</option>
                                                                                    <option value="Falta de compromiso">Falta de compromiso</option>
                                                                                    <option value="Falta de atención">Falta de atención</option>
                                                                                    <option value="Falta de participación">Falta de participación</option>
                                                                                    <option value="Falta de interés">Falta de interés</option>
                                                                                    <option value="Falta de esfuerzo">Falta de esfuerzo</option>
                                                                                    <option value="Falta de dedicación">Falta de dedicación</option>
                                                                                    <option value="Falta de colaboración">Falta de colaboración</option>
                                                                                    <option value="Falta de asistencia">Falta de asistencia</option>
                                                                                    <option value="Falta de entrega de trabajos">Falta de entrega de trabajos</option>
                                                                                    <option value="Rendimiento Academico">Rendimiento Académico</option>
                                                                                </select>
                                                                                <label>Descripción</label>
                                                                                <textarea class="form-control" name="nota" id="nota" rows="3" required></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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
        <br>
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Reportes de Incidencias Registrados</h3>

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
                                    <th>Estudiante</th>
                                    <th>Fecha de reporte</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador_kardex = 1;
                                foreach ($kardexs as $kardex) {
                                    $id_kardex = $kardex['id_kadex'];

                                    if ($email_sesion == $kardex['email']) {
                                ?>
                                        <tr>
                                            <td><?php echo $contador_kardex++; ?></td>
                                            <td><?php echo $kardex['nivel']; ?></td>
                                            <td><?php echo $kardex['turno']; ?></td>
                                            <td><?php echo $kardex['curso']; ?></td>
                                            <td><?php echo $kardex['seccion']; ?></td>
                                            <td><?php echo $kardex['nombre_materia']; ?></td>
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
                                            <center>
                                                <td>
                                                    <center>
                                                        <!-- //mandamos todois los ids aprovechando que en la tbl asignacion hay estos ids -->
                                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $id_asignacion; ?>">
                                                            <i class="fas fa-edit"></i> Reportar Incidencia</a>
                                                    </center>

                                                    <!-- Modal -->
                                                </td>
                                                <div class="modal fade" id="exampleModal<?= $id_asignacion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Reporten de Incidencias del grado: <?= $asignacion['curso'] ?></h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= APP_URL ?>/app/controladores/kardex/kardexCreateControlador.php">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Fecha del Reporte</label>
                                                                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                                                                                <input type="text" name="docente_id" id="docente_id" value="<?= $docente_id ?>" hidden>

                                                                                <label>Estudiante</label>
                                                                                <select class="form-control" name="estudiante_id" id="estudiante_id" required>
                                                                                    <option value="">Seleccione un estudiante</option>
                                                                                    <?php
                                                                                    foreach ($estudiantes as $estudiante) {
                                                                                        if ($estudiante['grado_id'] == $asignacion['grado_id']) {

                                                                                            $id_estudiante = $estudiante['id_estudiante']; ?>
                                                                                            <option value="<?= $id_estudiante ?>"><?= $estudiante['apellidos'] . ' ' . $estudiante['nombres'] ?></option>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <label>Materia</label>
                                                                                <input type="text" name="" class="form-control" value="<?= $asignacion['nombre_materia'] ?>" readonly>
                                                                                <input type="text" name="materia_id" value="<?= $asignacion['materia_id'] ?> " hidden>

                                                                                <label>Observación</label>
                                                                                <select class="form-control" name="observacion" id="observacion">
                                                                                    <option value="">Seleccione una observación</option>
                                                                                    <option value="Falta de respeto">Falta de respeto</option>
                                                                                    <option value="Falta de puntualidad">Falta de puntualidad</option>
                                                                                    <option value="Falta de responsabilidad">Falta de responsabilidad</option>
                                                                                    <option value="Falta de compromiso">Falta de compromiso</option>
                                                                                    <option value="Falta de atención">Falta de atención</option>
                                                                                    <option value="Falta de participación">Falta de participación</option>
                                                                                    <option value="Falta de interés">Falta de interés</option>
                                                                                    <option value="Falta de esfuerzo">Falta de esfuerzo</option>
                                                                                    <option value="Falta de dedicación">Falta de dedicación</option>
                                                                                    <option value="Falta de colaboración">Falta de colaboración</option>
                                                                                    <option value="Falta de asistencia">Falta de asistencia</option>
                                                                                    <option value="Falta de entrega de trabajos">Falta de entrega de trabajos</option>
                                                                                    <option value="Rendimiento Academico">Rendimiento Académico</option>
                                                                                </select>
                                                                                <label>Descripción</label>
                                                                                <textarea class="form-control" name="nota" id="nota" rows="3" required></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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