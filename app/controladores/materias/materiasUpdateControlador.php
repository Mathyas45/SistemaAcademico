<?php
include('../../config.php');

$id_materia = $_POST['id_materia'];
$nombre_materia = $_POST['nombre_materia'];

$sentencia = $pdo->prepare('UPDATE materias SET
nombre_materia=:nombre_materia, fyh_actualizacion=:fyh_acualizacion WHERE id_materia=:id_materia
');

$sentencia->bindParam(':nombre_materia', $nombre_materia);
$sentencia->bindParam('fyh_acualizacion', $fechayhora);
$sentencia->bindParam('id_materia', $id_materia);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "La materia se ha actualizado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/materias');
} else {
    session_start();
    $_SESSION['mensaje'] = "La materia NO se actualizó correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/materias/edit.php');
}
