<?php


$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN gestiones as ges ON niv.gestion_id = ges.id_gestion where niv.id_nivel = '$id_nivel' and niv.estado = '1' ";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->execute();
$datos_niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_niveles as $datos_nivel){
    $gestion_id = $datos_nivel['gestion_id'];
    $gestion = $datos_nivel['gestion'];
    $nivel = $datos_nivel['nivel'];
    $turno = $datos_nivel['turno'];
    $fyh_creacion = $datos_nivel['fyh_creacion'];
    $estado = $datos_nivel['estado'];
    
}
