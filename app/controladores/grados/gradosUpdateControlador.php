<?php
include('../../config.php');

$id_grado = $_POST['id_grado'];

$nivel_id = $_POST['nivel_id'];
$curso = $_POST['curso'];
$seccion = $_POST['seccion'];

$sentencia = $pdo->prepare('UPDATE grados SET 
nivel_id=:nivel_id,curso=:curso,seccion=:seccion, fyh_actualizacion=:fyh_actualizacion WHERE id_grado=:id_grado');

$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':curso', $curso);
$sentencia->bindParam(':seccion', $seccion);
$sentencia->bindParam('fyh_actualizacion', $fechayhora);
$sentencia->bindParam('id_grado', $id_grado);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Grado se ha Actualizado correctamente!!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/grados');
} else {
    session_start();
    $_SESSION['mensaje'] = "El Grado NO se Actualizó correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/grados/edit.php');
}
