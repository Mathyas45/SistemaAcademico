<?php

$sql_docente = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON usu.rol_id = rol.id_rol INNER JOIN personas as per
ON per.usuario_id =usu.id_usuario INNER JOIN docentes as doce ON doce.persona_id = per.id_persona where doce.estado ='1' and doce.id_docente = '$id_docente' ";
$query_docente = $pdo->prepare($sql_docente);
$query_docente->execute();
$docentes = $query_docente->fetchAll(PDO::FETCH_ASSOC);

foreach ($docentes as $docente) {

    $id_usuario = $docente['id_usuario'];
    $id_persona = $docente['id_persona'];
    $rol_id = $docente['rol_id'];
    $nombre_rol = $docente['nombre_rol'];
    $nombres = $docente['nombres'];
    $apellidos = $docente['apellidos'];
    $dni = $docente['dni'];
    $email = $docente['email'];
    $fecha_nacimiento = $docente['fecha_nacimiento'];
    $celular = $docente['celular'];
    $profesion = $docente['profesion'];
    $direccion = $docente['direccion'];
    $fecha_creacion = $docente['fyh_creacion'];

    $especialidad = $docente['especialidad'];
    $antiguedad = $docente['antiguedad'];
}
