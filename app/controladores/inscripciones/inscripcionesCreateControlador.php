<?php
include('../../config.php');

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

//insertar en la tabla usuarios
$password = password_hash($dni, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
    (rol_id,email,password, fyh_creacion, estado)
    VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);
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
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

/////////INSERTAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('INSERT INTO estudiantes
(persona_id, codigo, nivel_id, grado_id, fyh_creacion, estado)
VALUES ( :persona_id, :codigo,:nivel_id, :grado_id, :fyh_creacion,:estado) ');

$sentencia->bindParam(':persona_id', $id_persona);
$sentencia->bindParam(':codigo', $codigo);
$sentencia->bindParam(':nivel_id', $nivel_id);
$sentencia->bindParam(':grado_id', $grado_id);
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);
$sentencia->execute();


$id_estudiante = $pdo->lastInsertId();
// echo "ID del estudiante: " . $id_estudiante;
/////////INSERTAR A LA TABLA padres familia

$sentencia = $pdo->prepare('INSERT INTO padres_familia
(estudiante_id, parentesco, nombres_apellidosPF, dniPF, direccionPF, celularPF, emailPF, ocupacionPF, fyh_creacion, estado)
VALUES (:estudiante_id, :parentesco, :nombres_apellidosPF, :dniPF, :direccionPF, :celularPF, :emailPF, :ocupacionPF, :fyh_creacion, :estado)');

$sentencia->bindParam(':estudiante_id', $id_estudiante);
$sentencia->bindParam(':parentesco', $parentesco);
$sentencia->bindParam(':nombres_apellidosPF', $nombres_apellidosPF);
$sentencia->bindParam(':dniPF', $dniPF);
$sentencia->bindParam(':direccionPF', $direccionPF);
$sentencia->bindParam(':celularPF', $celularPF);
$sentencia->bindParam(':emailPF', $emailPF);
$sentencia->bindParam(':ocupacionPF', $ocupacion);
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);

if ($sentencia->execute()) {
    // echo "Registros insertados correctamente.";
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "El Estudiante fue registrado exitosamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/estudiantes');
} else {
    echo "ERROR. El usuario no fue registrado!";
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "ERROR. El Estudiante no fue registrado";
    $_SESSION['icono'] = "error";
?><script>
        window.history.back();
    </script><?php
            }
