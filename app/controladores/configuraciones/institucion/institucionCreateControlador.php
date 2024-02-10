<?php
include('../../../config.php');

$nombre_Institucion = $_POST['nombre_Institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];
//aca traemos la variable logo asi que no hace falta declararla arriba
if ($_FILES['logo']['name'] != null) {
    $nombre_del_archivo = date("Y-m-d-H-i-s") . $_FILES['logo']['name'];
    $location = "../../../../public/images/configuracion/" . $nombre_del_archivo;
    move_uploaded_file($_FILES['logo']['tmp_name'], $location);
    $logo = $nombre_del_archivo;
} else {
    $logo = "";
}

$sentencia = $pdo->prepare('INSERT INTO configuracion_instituciones
(nombre_Institucion,logo,direccion,telefono,celular,email, fyh_creacion, estado)
VALUES ( :nombre_Institucion,:logo,:direccion,:telefono,:celular,:email,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_Institucion', $nombre_Institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam('fyh_creacion', $fechayhora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "La institución se ha registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/configuraciones/institucion');
} else {
    session_start();
    $_SESSION['mensaje'] = "El rol NO se registró correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/configuraciones/institucion/create.php');
}
