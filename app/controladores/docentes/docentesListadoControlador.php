<?php

$sql_docente = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON usu.rol_id = rol.id_rol INNER JOIN personas as per
 ON per.usuario_id =usu.id_usuario INNER JOIN docentes as doce ON doce.persona_id = per.id_persona where doce.estado ='1' ";
$query_docente = $pdo->prepare($sql_docente);
$query_docente->execute();
$docentes = $query_docente->fetchAll(PDO::FETCH_ASSOC);

