<?php
$id_grado_get = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_materia_get = $_GET['id_materia'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/estudiantes/estudiantesListadoControlador.php');
include('../../app/controladores/calificaciones/calificacionesListadoControlador.php');





$curso = "";
$seccion = "";

foreach ($estudiantes as $estudiante) {
    if ($id_grado_get == $estudiante['id_grado']) {
        $curso = $estudiante['curso'];
        $seccion = $estudiante['seccion'];
    }
}
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
                        <h1 class="ml-4">Listado de Estudiantes del grado: <?= $curso . '| sección: ' . $seccion; ?></h1>

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
                                    <th>Nivel</th>
                                    <th>Turno</th>
                                    <th>Grado</th>
                                    <th>1er trimestre</th>
                                    <th>2do trimestre</th>
                                    <th>3er trimestre</th>
                                    <th>Nota Final</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                $nota1= "";
                                $nota2= "";
                                $nota3= "";
                                $nota_final= "";
                                foreach ($estudiantes as $estudiante) {

                                    if ($id_grado_get == $estudiante['id_grado']) {
                                        $contador = $contador + 1;

                                        $id_estudiante = $estudiante['id_estudiante'];
                                ?>
                                        <tr>
                                            <td>
                                                <input type="text" id="estudiante_<?= $contador ?>" hidden value="<?= $id_estudiante; ?>">
                                                <?= $contador; ?>
                                            </td>
                                            <td><?= $estudiante['nombres'] . " " . $estudiante['apellidos']; ?></td>
                                            <td><?= $estudiante['dni']; ?></td>
                                            <td><?= $estudiante['nivel']; ?></td>
                                            <td><?= $estudiante['turno']; ?></td>
                                            <td><?= $estudiante['curso']; ?></td>
                                            <?php
                                            
                                            foreach($calificaciones as $calificacion){
                                                if(($calificacion['docente_id']==$id_docente_get) && ($calificacion['estudiante_id']==$id_estudiante) && ($calificacion['materia_id']==$id_materia_get)){
                                                    $nota1 = $calificacion['nota1'];
                                                    $nota2 = $calificacion['nota2'];
                                                    $nota3 = $calificacion['nota3'];
                                                    $nota_final = $calificacion['notaFinal'];
                                                }
                                            }
                                            ?>
                                            <td>
                                                <input type="number" style="text-align: center;" value="<?=$nota1?>" id="nota1_<?= $contador ?>" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" style="text-align: center;" value="<?=$nota2?>" class="form-control" id="nota2_<?= $contador ?>">
                                            </td>
                                            <td>
                                                <input type="number" style="text-align: center;" value="<?=$nota3?>" class="form-control" id="nota3_<?= $contador ?>">
                                            </td>
                                            <td>
                                                <input type="number" style="text-align: center;" value="<?=$nota_final?>" class="form-control" id="nota_final<?= $contador ?>" readonly>
                                            </td>


                                        </tr>

                                <?php
                                    }
                                }
                                // $contador = $contador ;
                                ?>
                            </tbody>
                        </table>
                        <hr>
                        <button class="btn btn-primary btn-lg" id="btn_guardar">Guardar Notas</button>
                        <script>
                            $('#btn_guardar').click(function() {
                                var n = '<?= $contador ?>';
                                var i = 1;
                                var id_docente = '<?= $id_docente_get ?>'
                                var id_materia = '<?= $id_materia_get ?>';

                                for (i = 1; i <= n; i++) {
                                    // Para la nota1
                                    var a = '#nota1_' + i;
                                    var nota1 = parseFloat($(a).val()) || 0;

                                    // Para la nota2 
                                    var b = '#nota2_' + i;
                                    var nota2 = parseFloat($(b).val()) || 0;

                                    // Para la nota3
                                    var c = '#nota3_' + i;
                                    var nota3 = parseFloat($(c).val()) || 0;

                                    // Calcular la suma de las notas
                                    var sumaNotas = (nota1 + nota2 + nota3)/3;

                                    // Para guardar la nota final
                                    var notaFinalID = '#nota_final' + i;
                                    $(notaFinalID).val(sumaNotas);
                                    notaFinalID = parseFloat($(notaFinalID).val()) || 0;

                                    //parar el id del estudiante que esta viniendo de del curso, por eso dentro del for
                                    var d = '#estudiante_' + i;
                                    var id_estudiante = $(d).val();;

                                    //enviar datos al controlador
                                    var url = "../../app/controladores/calificaciones/calificacionesCreateControlador.php";
                                    $.get(url, {
                                        id_docente: id_docente,
                                        id_estudiante: id_estudiante,
                                        id_materia: id_materia,
                                        nota1:nota1,
                                        nota2:nota2,
                                        nota3:nota3,
                                        nota_final:notaFinalID,
                                    }, function(datos) {
                                        // alert("datos guardados correctamente");
                                        $('#respuesta').html(datos);
                                    });
                                }
                                    Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Se cargó las notas",
                                    showConfirmButton: false,
                                    timer: 3500
                                });
                            });
                        </script>
                        <div id="respuesta" hidden></div>
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