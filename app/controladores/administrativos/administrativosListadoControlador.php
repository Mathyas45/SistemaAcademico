<?php

$sql_administrativo = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON usu.rol_id = rol.id_rol INNER JOIN personas as per
 ON per.usuario_id =usu.id_usuario INNER JOIN administrativos as admi ON admi.persona_id = per.id_persona where admi.estado ='1' ";
$query_administrativo = $pdo->prepare($sql_administrativo);
$query_administrativo->execute();
$administrativos = $query_administrativo->fetchAll(PDO::FETCH_ASSOC);

