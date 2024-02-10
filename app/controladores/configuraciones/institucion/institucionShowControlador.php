<?php

$sql_instituciones = "SELECT * FROM configuracion_instituciones where id_config_institucion = '$id_config_institucion' and estado = '1' ";
$query_instituciones = $pdo->prepare($sql_instituciones);
$query_instituciones->execute();
$datos_instituciones = $query_instituciones->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_instituciones as $datos_institucion) {
    $nombre_Institucion = $datos_institucion['nombre_Institucion'];
    $direccion = $datos_institucion['direccion'];
    $telefono = $datos_institucion['telefono'];
    $celular = $datos_institucion['celular'];
    $email = $datos_institucion['email'];
    $logo = $datos_institucion['logo'];
}
