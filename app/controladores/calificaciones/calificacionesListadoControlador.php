<?php

$sql_calificacion = "SELECT * FROM calificaciones where estado ='1' ";
$query_calificacion = $pdo->prepare($sql_calificacion);
$query_calificacion->execute();
$calificaciones = $query_calificacion->fetchAll(PDO::FETCH_ASSOC);
