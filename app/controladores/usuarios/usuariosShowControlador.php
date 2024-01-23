<?php

$sql_usuarios = "SELECT * FROM usuarios as usu INNER JOIN roles as rol on rol.id_rol = usu.rol_id where usu.id_usuario = '$id_usuario' and usu.estado = '1' ";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_usuarios as $datos_usuario) {
    $nombre_rol = $datos_usuario['nombre_rol'];
    $email = $datos_usuario['email'];
    $password = $datos_usuario['password'];
    $fyh_creacion = $datos_usuario['fyh_creacion'];
}
