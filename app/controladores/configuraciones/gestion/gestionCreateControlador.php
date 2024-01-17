<?php
include('../../../config.php');

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('INSERT INTO gestiones
(gestion, fyh_creacion, estado)
VALUES ( :gestion,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion', $gestion);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estado);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Periodo se ha registrado correctamente!!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/configuraciones/gestion');
} else {
    session_start();
    $_SESSION['mensaje'] = "El Periodo NO se registró correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin//configuraciones/gestion/create.php');
}