<?php

$sql_administrativo = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON usu.rol_id = rol.id_rol INNER JOIN personas as per
ON per.usuario_id =usu.id_usuario INNER JOIN administrativos as admi ON admi.persona_id = per.id_persona where admi.estado ='1' and admi.id_administrativo = '$id_administrativo' ";
$query_administrativo = $pdo->prepare($sql_administrativo);
$query_administrativo->execute();
$administrativos = $query_administrativo->fetchAll(PDO::FETCH_ASSOC);

foreach ($administrativos as $administrativo) {

    $id_administrativo = $administrativo['id_administrativo'];
    $id_usuario = $administrativo['id_usuario'];
    $id_persona = $administrativo['id_persona'];

    $rol_id = $administrativo['rol_id'];
    $nombre_rol = $administrativo['nombre_rol'];
    $nombres = $administrativo['nombres'];
    $apellidos = $administrativo['apellidos'];
    $dni = $administrativo['dni'];
    $email = $administrativo['email'];
    $fecha_nacimiento = $administrativo['fecha_nacimiento'];
    $fyh_creacion = $administrativo['fyh_creacion'];
    $celular = $administrativo['celular'];
    $profesion = $administrativo['profesion'];
    $direccion = $administrativo['direccion'];
}
