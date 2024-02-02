<?php

$sql_estudiante = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON usu.rol_id = rol.id_rol 
INNER JOIN personas as per ON per.usuario_id =usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona 
inner join niveles as niv ON niv.id_nivel = est.nivel_id
inner join grados as gra ON gra.id_grado = est.grado_id
inner join padres_familia as pf on pf.estudiante_id = est.id_estudiante
 where est.estado ='1' and est.id_estudiante = '$id_estudiante' ";
$query_estudiante = $pdo->prepare($sql_estudiante);
$query_estudiante->execute();
$estudiantes = $query_estudiante->fetchAll(PDO::FETCH_ASSOC);
foreach ($estudiantes as $estudiante) {

    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    $id_padres_familia = $estudiante['id_padres_familia'];
    
    
    $codigo_estudiante = $estudiante['codigo'];
    $nombre_estudiante = $estudiante['nombres'];
    $apellido_estudiante = $estudiante['apellidos'];
    $dni_estudiante = $estudiante['dni'];
    $email_estudiante = $estudiante['email'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $telefono_estudiante = $estudiante['celular'];
    $direccion_estudiante = $estudiante['direccion'];
    $rol_estudiante = $estudiante['nombre_rol'];
    $nivel_estudiante = $estudiante['nivel'];
    $nivel_id = $estudiante['nivel_id'];
    $grado_id = $estudiante['grado_id'];
    $grado_estudiante = $estudiante['curso'];
    $seccion_estudiante = $estudiante['seccion'];
    $parentesco = $estudiante['parentesco'];
    $nombres_padre = $estudiante['nombres_apellidosPF'];
    $dni_padre = $estudiante['dniPF'];
    $email_padre = $estudiante['emailPF'];
    $telefono_padre = $estudiante['celularPF'];
    $direccion_padre = $estudiante['direccionPF'];
    $ocupacion_padre = $estudiante['ocupacionPF'];
}
