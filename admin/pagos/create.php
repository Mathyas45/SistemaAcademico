<?php
$id_estudiante = $_GET['id'];

include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controladores/estudiantes/estudiantesShowControlador.php');
include('../../app/controladores/pagos/pagosShowControlador.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="container-fluid">
        <br>


        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="card card-outline card-primary ">
                    <div class="card-header">
                        <h1>PAGO DE CUOTAS</h1>
                        <h3>
                            <b>Estudiante: </b><?= $nombre_estudiante . ' ' . $apellido_estudiante; ?>
                            <br>
                            <b>DNI: </b><?= $dni_estudiante; ?>
                        </h3>

                    </div>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pagos Registrados</h3>
                        <div style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-cash-coin"></i> Registrar Pago
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="example1" class="table table-resposive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">N° Cuota</th>
                                    <th style="text-align: center">Mes cancelado</th>
                                    <th style="text-align: center">Monto</th>
                                    <th style="text-align: center">Fecha de Pago</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>
                            <?php
                            $contador = 1;
                            foreach ($pagos as $pago) {
                                $estudiante_id = $pago['estudiante_id'];
                                $id_pago = $pago['id_pago']; ?>
                                <tr>
                                    <td style="text-align: center"><?= $contador++; ?></td>
                                    <td style="text-align: center"><?= $pago['mes_pagado']; ?></td>
                                    <td style="text-align: center"><?= 'S/. ' . $pago['monto_pagado']; ?></td>
                                    <td style="text-align: center"><?= $pago['fecha_pago']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                            <a data-toggle="modal" data-target="#modal_editar<?= $id_pago; ?>" type="button" class="btn btn-warning ml-5"><i class="bi bi-pencil-fill"></i> Editar</a>
                                            <div class="modal fade" id="modal_editar<?= $id_pago; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Pago</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= APP_URL; ?>/app/controladores/pagos/PagosUpdateControlador.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">

                                                                            <label for="">Estudiante</label>
                                                                            <input type="text" class="form-control" value="<?= $nombre_estudiante . ' ' . $apellido_estudiante; ?>" disabled>
                                                                            <input type="hidden" name="estudiante_id" value="<?= $id_estudiante; ?>">
                                                                            <input type="hidden" name="id_pago" value="<?= $id_pago; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""># Dni</label>
                                                                            <input type="text" class="form-control" name="dni" value="<?= $dni_estudiante; ?>" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Mes pagado</label>
                                                                            <select name="mes_pagado" id="" class="form-control">
                                                                                <option value="Enero" <?= $pago['mes_pagado'] == "Enero" ? 'Selected' : '' ?>>Enero</option>
                                                                                <option value="Febrero" <?= $pago['mes_pagado'] == "Febrero" ? 'Selected' : '' ?>>Febrero</option>
                                                                                <option value="Marzo" <?= $pago['mes_pagado'] == "Marzo" ? 'Selected' : '' ?>>Marzo</option>
                                                                                <option value="Abril" <?= $pago['mes_pagado'] == "Abril" ? 'Selected' : '' ?>>Abril</option>
                                                                                <option value="Mayo" <?= $pago['mes_pagado'] == "Mayo" ? 'Selected' : '' ?>>Mayo</option>
                                                                                <option value="Junio" <?= $pago['mes_pagado'] == "Junio" ? 'Selected' : '' ?>>Junio</option>
                                                                                <option value="Julio" <?= $pago['mes_pagado'] == "Julio" ? 'Selected' : '' ?>>Julio</option>
                                                                                <option value="Agosto" <?= $pago['mes_pagado'] == "Agosto" ? 'Selected' : '' ?>>Agosto</option>
                                                                                <option value="Septiembre" <?= $pago['mes_pagado'] == "Septiembre" ? 'Selected' : '' ?>>Septiembre</option>
                                                                                <option value="Octubre" <?= $pago['mes_pagado'] == "Octubre" ? 'Selected' : '' ?>>Octubre</option>
                                                                                <option value="Noviembre" <?= $pago['mes_pagado'] == "Noviembre" ? 'Selected' : '' ?>>Noviembre</option>
                                                                                <option value="Diciembre" <?= $pago['mes_pagado'] == "Diciembre" ? 'Selected' : '' ?>>Diciembre</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Monto Pagado</label>
                                                                            <input type="number" step="0.01" class="form-control" name="monto_pagado" value="<?= $pago['monto_pagado'] ?>" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Fecha de Pago</label>
                                                                            <input type="date" class="form-control" name="fecha_pago" value="<?= $pago['fecha_pago'] ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar Pago</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $id_pago; ?>);">
                                                <i class="bi bi-trash3-fill"></i> Eliminar
                                            </a>
                                            <a href="comprobantePago.php?id=<?= $id_pago;?>&&id_estudiante=<?=$estudiante_id;?>" type="button" class="btn btn-success"><i class="bi bi-file-pdf-fill"></i> Comprobante</a>

                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                    </div>



                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controladores/pagos/PagosCreateControlador.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <label for="">Estudiante</label>
                                <input type="text" class="form-control" value="<?= $nombre_estudiante . ' ' . $apellido_estudiante; ?>" disabled>
                                <input type="hidden" name="estudiante_id" value="<?= $id_estudiante; ?>">
                            </div>
                            <div class="form-group">
                                <label for=""># Dni</label>
                                <input type="text" class="form-control" name="dni" value="<?= $dni_estudiante; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Mes pagado</label>
                                <select name="mes_pagado" id="" class="form-control">
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Monto Pagado</label>
                                <input type="number" step="0.01" class="form-control" name="monto_pagado" required>
                            </div>

                            <div class="form-group">
                                <label for="">Fecha de Pago</label>
                                <input type="date" class="form-control" name="fecha_pago" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Pago</button>
            </div>
            </form>

        </div>
    </div>
</div>
<?php
include('../layout/parte2.php');
include('../../layout/mensajes.php');

?>

<script>
        $(document).ready(function() {
            // Se ejecuta cada vez que el modal se muestra
            $('#exampleModal').on('show.bs.modal', function(event) {
                // Limpiar los valores de los campos del formulario dentro del modal
                $(this).find('form')[0].reset();
            });
        });

function confirmarEliminacion(id_pago) {
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
window.location.href = "delete.php?id_pago=" + id_pago;
}
});
return false; // Evita el comportamiento predeterminado del enlace
}
$(function() {
$("#example1").DataTable({
"pageLength": 10,
"language": {
"emptyTable": "No hay información",
"info": "Mostrando _START_ a _END_ de _TOTAL_ Grados",
"infoEmpty": "Mostrando 0 a 0 de 0 Grados",
"infoFiltered": "(Filtrado de _MAX_ total Grados)",
"infoPostFix": "",
"thousands": ",",
"lengthMenu": "Mostrar _MENU_ Grados",
"loadingRecords": "Cargando...",
"processing": "Procesando...",
"search": "false",
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