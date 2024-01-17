<?php
include('../../../config.php');

$id_gestion = $_POST['id_gestion'];
$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('UPDATE gestiones set
gestion=:gestion, fyh_actualizacion=:fyh_actualizacion, estado=:estado
where id_gestion=:id_gestion');

$sentencia->bindParam(':gestion', $gestion);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':estado', $estado);
$sentencia->bindParam(':id_gestion', $id_gestion);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Periodo se ha actualizado correctamente!!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/configuraciones/gestion');
} else {
    session_start();
    $_SESSION['mensaje'] = "El Periodo NO se actualizó correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin//configuraciones/gestion/update.php');
}