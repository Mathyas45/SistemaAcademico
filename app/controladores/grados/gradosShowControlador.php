<?php


$sql_grados = "SELECT * FROM grados as gra INNER JOIN niveles as niv ON gra.nivel_id = niv.id_nivel where gra.estado = '1' and gra.id_grado ='$id_grado' ";
$query_grados = $pdo->prepare($sql_grados);
$query_grados->execute();

$datos_grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_grados as $datos_grados) {

    $nivel_id = $datos_grados['nivel_id'];
    $nivel = $datos_grados['nivel'];
    $curso = $datos_grados['curso'];
    $seccion = $datos_grados['seccion'];
    $turno = $datos_grados['turno'];
    $estado = $datos_grados['estado'];
}
