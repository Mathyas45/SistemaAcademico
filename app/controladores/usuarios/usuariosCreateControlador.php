<?php
include('../../config.php');

$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$estado_del_registro ='1';

if ($password == $password_repeat) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
    (rol_id,email,password, fyh_creacion, estado)
    VALUES ( :rol_id,:email,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_creacion', $fechayhora);
    $sentencia->bindParam('estado', $estado_del_registro);
    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El usuario fue registrado exitosamente!";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . '/admin/usuarios');
        } else {
            session_start();
            $_SESSION['mensaje'] = "ERROR. El usuario no fue registrado!";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . '/admin/usuarios/create.php');
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "ERROR. El correo ya existe";
        $_SESSION['icono'] = "error";
        ?><script>
            window.history.back();
        </script><?php
                }
} else {
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
        ?><script>
window.history.back();
</script><?php
}
