<?php
include('../../config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = "El campo nombree s campo es obligatorio";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/roles/create.php');
} else {

    $sentencia = $pdo->prepare("INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES (:nombre_rol, :fyh_creacion, :estado) ");
    $sentencia->bindParam(':nombre_rol', $nombre_rol);
    $sentencia->bindParam(':fyh_creacion', $fechayhora);
    $sentencia->bindParam(':estado', $estadoRegistro);
    
    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El rol se ha registrado correctamente";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . '/admin/roles');
        } else {
            session_start();
            $_SESSION['mensaje'] = "El rol NO se registró correctamente";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . '/admin/roles/create.php');
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "Este rol ya existe";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . '/admin/roles/create.php');
    }
}
