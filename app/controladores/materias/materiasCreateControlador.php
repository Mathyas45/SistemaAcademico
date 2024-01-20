<?php
include('../../config.php');

$nombre_materia = $_POST['nombre_materia'];

$sentencia = $pdo->prepare('INSERT INTO materias
(nombre_materia, fyh_creacion, estado)
VALUES ( :nombre_materia,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_materia', $nombre_materia);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "La materia se ha registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/materias');
} else {
    session_start();
    $_SESSION['mensaje'] = "La materia NO se registró correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/materias/create.php');
}
