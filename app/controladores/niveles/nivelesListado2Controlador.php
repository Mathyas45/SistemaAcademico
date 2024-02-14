<?php
$sql_niveles_asignaciones = "SELECT niveles.*, asignaciones.* 
                             FROM niveles 
                             INNER JOIN asignaciones ON niveles.id_nivel = asignaciones.nivel_id 
                             WHERE niveles.estado = '1'";
$query_niveles_asignaciones = $pdo->prepare($sql_niveles_asignaciones);
$query_niveles_asignaciones->execute();
$niveles= $query_niveles_asignaciones->fetchAll(PDO::FETCH_ASSOC);