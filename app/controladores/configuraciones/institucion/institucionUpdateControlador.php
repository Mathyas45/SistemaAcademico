<?php
include('../../../config.php');

$id_config_institucion  = $_POST['id_config_institucion'];
$nombre_Institucion = $_POST['nombre_Institucion'];
$logo = $_POST['logo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];


//verificamos si existe imagen con su nombre
if($_FILES['logo']['name'] != null){
    //echo "existe una imagen";
    $nombre_del_archivo =  date('Y-m-d-H-i-s').$_FILES['logo']['name'];
    $location = "../../../../public/images/configuracion/".$nombre_del_archivo;
    move_uploaded_file($_FILES['logo']['tmp_name'],$location);
    $logo = $nombre_del_archivo;
}else{
    //echo "no existe imagen";
    if($logo == ""){
        $logo = "";
    }else{
        $logo = $_POST['logo'];
    }
}



$sentencia = $pdo->prepare('UPDATE configuracion_instituciones set
nombre_Institucion=:nombre_Institucion,logo=:logo,direccion=:direccion,telefono=:telefono,celular=:celular,email=:email, fyh_actualizacion=:fyh_actualizacion
WHERE id_config_institucion=:id_config_institucion ');

$sentencia->bindParam(':nombre_Institucion', $nombre_Institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':fyh_actualizacion', $fechayhora);
$sentencia->bindParam(':id_config_institucion', $id_config_institucion);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "La institución se ha actualizado correctamente!";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/configuraciones/institucion');
} else {
    session_start();
    $_SESSION['mensaje'] = "El rol NO se actualizó correctamente";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . '/admin/configuraciones/institucion/update.php');
}
