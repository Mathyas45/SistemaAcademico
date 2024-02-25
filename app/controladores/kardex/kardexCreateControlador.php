<?php
include('../../config.php');


$docente_id = $_GET['docente_id'];
$fecha  = $_GET['fecha'];
$estudiante_id =   $_GET['estudiante_id'];
$materia_id  = $_GET['materia_id'];
$observacion = $_GET['observacion'];
$nota = $_GET['nota'];


$sentencia = $pdo->prepare('INSERT INTO kadexs
(docente_id,estudiante_id,materia_id, fecha, observacion, nota,fyh_creacion, estado)
VALUES ( :docente_id,:estudiante_id,:materia_id,:fecha, :observacion,:nota,:fyh_creacion,:estado)');

$sentencia->bindParam(':docente_id', $docente_id);
$sentencia->bindParam(':estudiante_id', $estudiante_id);
$sentencia->bindParam(':materia_id', $materia_id);
$sentencia->bindParam(':fecha', $fecha);
$sentencia->bindParam(':observacion', $observacion);
$sentencia->bindParam(':nota', $nota);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Reporte de incidencia se ha registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/kardex');
} else {
    session_start();
    $_SESSION['mensaje'] = "El Reporte de incidencia NO se registró correctamente";
    $_SESSION['icono'] = "error";
    ?>
<script>window.history.back();</script>;
<?php
}
