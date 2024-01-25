<?php
include('../../config.php');

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];

$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];


$pdo->beginTransaction();

//insertar en la tabla usuarios
$password = password_hash($dni, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
    (rol_id,email,password, fyh_creacion, estado)
    VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertId();

///////INSERTAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,dni,fecha_nacimiento,celular,profesion,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:dni,:fecha_nacimiento,:celular,:profesion,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id', $id_usuario);
$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':dni', $dni);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

/////////INSERTAR A LA TABLA ADMINISTRATIVOS
$sentencia = $pdo->prepare('INSERT INTO docentes
(persona_id, especialidad, antiguedad, fyh_creacion, estado)
VALUES ( :persona_id, :especialidad, :antiguedad,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam('especialidad', $especialidad);
$sentencia->bindParam('antiguedad', $antiguedad);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    // echo "Registros insertados correctamente.";
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "El Docente fue registrado exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/docentes');
} else {
    echo "ERROR. El usuario no fue registrado!";
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "ERROR. El Docente no fue registrado";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/docentes/create.php');
}
