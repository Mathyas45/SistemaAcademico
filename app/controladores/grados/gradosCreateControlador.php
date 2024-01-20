<?php
include('../../config.php');

$nivel_id = $_POST['nivel_id'];
$curso = $_POST['curso'];
$seccion = $_POST['seccion'];

$sentencia = $pdo->prepare('INSERT INTO grados
(nivel_id,curso,seccion, fyh_creacion, estado)
VALUES ( :nivel_id,:curso,:seccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':curso', $curso);
$sentencia->bindParam(':seccion', $seccion);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Grado se ha registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/grados');
} else {
    session_start();
    $_SESSION['mensaje'] = "El Grado NO se registró correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/grados/create.php');
}
