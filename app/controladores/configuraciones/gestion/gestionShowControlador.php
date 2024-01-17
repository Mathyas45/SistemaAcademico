<?php

$sql_gestiones = "SELECT * FROM gestiones where id_gestion = '$id_gestion' ";
$query_gestiones = $pdo->prepare($sql_gestiones);
$query_gestiones->execute();
$datos_gestiones = $query_gestiones->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_gestiones as $datos_gestion) {
    $gestion = $datos_gestion['gestion'];
    $estado = $datos_gestion['estado'];
    $fyh_creacion = $datos_gestion['fyh_creacion'];
}
