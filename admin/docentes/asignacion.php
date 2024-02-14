<?php
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/docentes/docentesListadoControlador.php');
include('../../app/controladores/niveles/nivelesListado2Controlador.php');
include('../../app/controladores/grados/gradosListadoControlador.php');
include('../../app/controladores/materias/materiasListadoControlador.php');
include('../../app/controladores/docentes/docentesAsignacionesListado.php');
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
                        <h1 class="ml-4">Listado de Personal Docente Asignado a las materias</h1>

                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Docentes Registrados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignacion">
                                <i class="bi bi-plus-square"> Asignar Materias al Docente</i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-resposive table-striped table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Datos Completos</th>
                                    <th>#Dni</th>
                                    <th>E-mail</th>
                                    <th>#celular</th>
                                    <th>estado</th>
                                    <th>Materias Asignadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($docentes as $docente) {
                                    $id_docente = $docente['id_docente'];
                                ?>
                                    <tr>
                                        <td><?= $contador++; ?></td>
                                        <td><?= $docente['nombres'] . " " . $docente['apellidos']; ?></td>
                                        <td><?= $docente['dni']; ?></td>
                                        <td><?= $docente['email']; ?></td>
                                        <td><?= $docente['celular']; ?></td>
                                        <td>
                                            <center>
                                                <?php
                                                if ($docente['estado'] == 1) { ?>
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
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_materias<?= $id_docente; ?>">
                                                    <i class="bi bi-card-checklist"></i> Ver Materias asignadas</i>
                                                </button>
                                            </center>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_materias<?= $id_docente; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Materias asignadas del docente: <?= $docente['nombres'] . " " . $docente['apellidos']; ?> </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-primary table-bordered table-striped table-sm table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nro</th>
                                                                        <th>Nivel</th>
                                                                        <th>Turno</th>
                                                                        <th>Grado</th>
                                                                        <th>seccion</th>
                                                                        <th>Materia</th>
                                                                        <th>Acciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $contador = 1;
                                                                    foreach ($asignaciones as $asignacion) {
                                                                        $id_asignacion = $asignacion['id_asignacion'];
                                                                        $nivel_id = $asignacion['nivel_id'];
                                                                        if ($asignacion['docente_id'] == $id_docente) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?= $contador++; ?></td>
                                                                                <td><?= $asignacion['nivel']; ?></td>
                                                                                <td><?= $asignacion['turno']; ?></td>
                                                                                <td><?= $asignacion['curso']; ?></td>
                                                                                <td><?= $asignacion['seccion']; ?></td>
                                                                                <td><?= $asignacion['nombre_materia']; ?></td>
                                                                                <td>

                                                                                    <div class="btn-group ml-5" role="group" aria-label="Basic mixed styles example">
                                                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal_edicion<?= $id_asignacion; ?>"><i class="bi bi-pencil-fill"></i> Editar</button>
                                                                                        <!-- Modal -->

                                                                                        <div class="modal fade" id="modal_edicion<?= $id_asignacion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Asignación de Materias del docente:<br> <?= $docente['nombres'] . " " . $docente['apellidos']; ?></h5>

                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <form action="<?= APP_URL; ?>/app/controladores/docentes/docentesAsignacionesUpdateControlador.php" method="post">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <input type="text" name="id_asignacion" value="<?= $id_asignacion ?>" hidden>
                                                                                                                        <label for="">Niveles</label>
                                                                                                                        <select name="id_nivel" id="id_nivel" class="form-control">
                                                                                                                            <option value="">Seleccione un nivel</option>

                                                                                                                            <?php
                                                                                                                            foreach ($niveles as $nivel) {
                                                                                                                                $nivel_id_opcion = $nivel['nivel_id']; // Cambia el nombre de la variable aquí
                                                                                                                                $id_nivel = $nivel['id_nivel']; // Cambia el nombre de la variable aquí
                                                                                                                            ?>
                                                                                                                                <option value="<?= $id_nivel; ?>" <?= $nivel_id_opcion == $asignacion['id_nivel'] ? 'selected' : '' ?>>
                                                                                                                                    <?= $nivel['nivel'] . " | turno: " . $nivel['turno']; ?>
                                                                                                                                </option> <?php
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
                                                                                                                        <select name="id_grado" id="id_grado" class="form-control">
                                                                                                                            <option value="">Seleccione un grado</option>
                                                                                                                            <?php
                                                                                                                            foreach ($grados as $grado) {
                                                                                                                                $id_grado = $grado['id_grado']; ?>

                                                                                                                                <option value="<?= $id_grado; ?>" <?= $grado['id_grado'] == $asignacion['grado_id'] ? 'selected' : ''; ?>>
                                                                                                                                    <?= $grado['curso'] . " | sección: " . $grado['seccion']; ?></option> <?php
                                                                                                                                                                                                        }
                                                                                                                                                                                                            ?>
                                                                                                                        </select>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="">Curso</label>
                                                                                                                        <select name="id_materia" id="id_materia" class="form-control">
                                                                                                                            <option>Seleccione un curso</option>
                                                                                                                            <?php
                                                                                                                            foreach ($materias as $materia) {

                                                                                                                                $id_materia = $materia['id_materia']; ?>

                                                                                                                                <option value="<?= $id_materia; ?>" <?= $materia['id_materia'] == $asignacion['materia_id'] ? 'selected' : ''; ?>>
                                                                                                                                    <?= $materia['nombre_materia']; ?></option>
                                                                                                                            <?php
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                        <button type="submit" class="btn btn-primary">Actualizar Materia</button>
                                                                                                    </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <a href="#" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $id_asignacion; ?>);">
                                                                                            <i class="bi bi-trash3-fill"></i> Eliminar
                                                                                        </a>
                                                                                    </div>
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
                                        </td>

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
    function confirmarEliminacion(id_asignacion) {
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
                window.location.href = "asignacionDelete.php?id_asignacion=" + id_asignacion;
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

<!-- Modal -->

<div class="modal fade" id="modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignación de Materias al docente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controladores/docentes/docentesAsignacionesCreateControlador.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Docentes</label>
                                <select name="id_docente" id="id_docente" class="form-control">
                                    <option value="">Seleccione un docente</option>
                                    <?php
                                    foreach ($docentes as $docente) {
                                        $id_docente = $docente['id_docente']; ?>

                                        <option value="<?= $id_docente; ?>"><?= $docente['nombres'] . " " . $docente['apellidos']; ?></option>
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
                                <label for="">Niveles</label>
                                <select name="id_nivel" id="id_nivel" class="form-control">
                                    <option value="">Seleccione un Nivel</option>
                                    <?php
                                    foreach ($niveles as $nivel) {
                                        $id_nivel = $nivel['id_nivel']; ?>

                                        <option value="<?= $id_nivel; ?>"><?= $nivel['nivel'] . ' | ' . $nivel['turno']; ?></option>
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
                                <select name="id_grado" id="id_grado" class="form-control">
                                    <option value="">Seleccione un grado</option>
                                    <?php
                                    foreach ($grados as $grado) {
                                        $id_grado = $grado['id_grado']; ?>

                                        <option value="<?= $id_grado; ?>"><?= $grado['curso'] . ' | sección: ' . $grado['seccion']; ?></option>
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
                                <label for="">Curso</label>
                                <select name="id_curso" id="id_curso" class="form-control">
                                    <option>Seleccione un curso</option>
                                    <?php
                                    foreach ($materias as $materia) {
                                        $id_materia = $materia['id_materia']; ?>
                                        <option value="<?= $id_materia; ?>"><?= $materia['nombre_materia']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar Materia asignada</button>
            </div>
            </form>
        </div>
    </div>
</div>