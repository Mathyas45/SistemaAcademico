<?php
include('../../config.php');


$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_padres_familia = $_POST['id_padres_familia'];



$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$profesion = 'estudiante';


$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$codigo = $_POST['codigo'];


$nombres_apellidosPF = $_POST['nombres_apellidosPF'];
$dniPF = $_POST['dniPF'];
$celularPF = $_POST['celularPF'];
$parentesco = $_POST['parentesco'];
$ocupacion = $_POST['ocupacion'];
$emailPF = $_POST['emailPF'];
$direccionPF = $_POST['direccionPF'];



$pdo->beginTransaction();

//ACTUALIZAR en la tabla usuarios
$password = password_hash($dni, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('UPDATE usuarios SET
    rol_id=:rol_id ,email=:email,password=:password, fyh_actualizacion=:fyh_actualizacion 
    WHERE id_usuario =:id_usuario' );

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->execute();



///////ACTUALIZAR A LA TABLA PERSONAS

$sentencia = $pdo->prepare('UPDATE personas SET nombres=:nombres, apellidos=:apellidos, dni=:dni, fecha_nacimiento=:fecha_nacimiento, celular=:celular, profesion=:profesion, direccion=:direccion, fyh_actualizacion=:fyh_actualizacion WHERE id_persona=:id_persona ');

$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':dni', $dni);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_persona', $id_persona);
$sentencia->execute();


/////////INSERTAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('UPDATE estudiantes SET
codigo=:codigo, nivel_id=:nivel_id, grado_id=:grado_id, fyh_actualizacion=:fyh_actualizacion where id_estudiante=:id_estudiante');

$sentencia->bindParam(':codigo', $codigo);
$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':grado_id', $grado_id);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_estudiante', $id_estudiante);
$sentencia->execute();



$sentencia = $pdo->prepare('UPDATE padres_familia SET 
parentesco=:parentesco, nombres_apellidosPF=:nombres_apellidosPF, dniPF=:dniPF, direccionPF=:direccionPF, celularPF=:celularPF, emailPF=:emailPF, ocupacionPF=:ocupacionPF, fyh_actualizacion=:fyh_actualizacion where id_padres_familia =:id_padres_familia');

$sentencia->bindParam(':parentesco', $parentesco);
$sentencia->bindParam(':nombres_apellidosPF', $nombres_apellidosPF);
$sentencia->bindParam(':dniPF', $dniPF);
$sentencia->bindParam(':direccionPF', $direccionPF);
$sentencia->bindParam(':celularPF', $celularPF);
$sentencia->bindParam(':emailPF', $emailPF);
$sentencia->bindParam(':ocupacionPF', $ocupacion);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_padres_familia', $id_padres_familia);

if ($sentencia->execute()) {
    // echo "Registros insertados correctamente.";
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "El Estudiante fue actualizado exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/estudiantes');
} else {
    echo "ERROR. El usuario no fue registrado!";
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "ERROR. El Estudiante no fue actualizado";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script><?php
            }
