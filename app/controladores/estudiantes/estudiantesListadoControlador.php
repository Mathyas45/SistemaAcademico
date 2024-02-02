<?php

$sql_estudiante = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON usu.rol_id = rol.id_rol 
INNER JOIN personas as per ON per.usuario_id =usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona 
inner join niveles as niv ON niv.id_nivel = est.nivel_id
inner join grados as gra ON gra.id_grado = est.grado_id
inner join padres_familia as pf on pf.estudiante_id = est.id_estudiante
 where est.estado ='1' ";
$query_estudiante = $pdo->prepare($sql_estudiante);
$query_estudiante->execute();
$estudiantes = $query_estudiante->fetchAll(PDO::FETCH_ASSOC);
