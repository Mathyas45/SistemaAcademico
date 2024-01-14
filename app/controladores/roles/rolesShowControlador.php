<?php


$sql_roles = "SELECT * FROM roles where id_rol = '$id_rol' and estado = '1' ";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$datos_roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_roles as $datos_role){
    $nombre_rol = $datos_role['nombre_rol'];
}
