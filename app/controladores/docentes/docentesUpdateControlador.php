<?php
include('../../config.php');

$id_docente = $_POST['id_docente'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];

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

//actualizar en la tabla usuarios
$password = password_hash($dni, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('UPDATE usuarios SET 
        rol_id=:rol_id,email=:email,password=:password, fyh_actualizacion=:fyh_actualizacion WHERE id_usuario =:id_usuario ');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->execute();


///////actualizar A LA TABLA PERSONAS

$sentencia = $pdo->prepare('UPDATE personas SET nombres=:nombres, apellidos=:apellidos, dni=:dni, fecha_nacimiento=:fecha_nacimiento, celular=:celular, profesion=:profesion, direccion=:direccion, fyh_actualizacion=:fyh_actualizacion WHERE id_persona=:id_persona ');
$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':dni', $dni);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam('fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_persona', $id_persona);
$sentencia->execute();


/////////actualizar A LA TABLA docentes
$sentencia = $pdo->prepare('UPDATE docentes SET
especialidad=:especialidad, antiguedad=:antiguedad, fyh_actualizacion=:fyh_actualizacion WHERE id_docente=:id_docente ');

$sentencia->bindParam(':especialidad', $especialidad);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_docente', $id_docente);

if ($sentencia->execute()) {
    // echo "Registros insertados correctamente.";
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "El Docente fue actualizado exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/docentes');
} else {
    echo "ERROR. El usuario no fue registrado!";
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "ERROR. El Docente no fue actualizado";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/docentes/edit.php');
}
