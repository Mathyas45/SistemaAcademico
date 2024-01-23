<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
$estado_del_registro = '1';

if ($password == "" && $password_repeat == "") {

    $sentencia = $pdo->prepare("UPDATE usuarios SET rol_id = :rol_id, email=:email, fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario ");

    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':fyh_actualizacion', $fechayhora);
    $sentencia->bindParam(':id_usuario', $id_usuario);
    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El usuario fue actualizado exitosamente!";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . '/admin/usuarios');
        } else {
            session_start();
            $_SESSION['mensaje'] = "ERROR. El usuario no fue actualizado!";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . '/admin/usuarios/edit.php');
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "ERROR. El correo ya existe";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            window.history.back();
        </script><?php
                }
            } else {
                if ($password == $password_repeat) {
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $sentencia = $pdo->prepare("UPDATE usuarios SET rol_id = :rol_id, email=:email, password=:password,fyh_actualizacion=:fyh_actualizacion
                    WHERE id_usuario=:id_usuario");

                    $sentencia->bindParam(':rol_id', $rol_id);
                    $sentencia->bindParam(':email', $email);
                    $sentencia->bindParam(':password', $password);
                    $sentencia->bindParam(':fyh_actualizacion', $fechayhora);
                    $sentencia->bindParam(':id_usuario', $id_usuario);
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
            }
