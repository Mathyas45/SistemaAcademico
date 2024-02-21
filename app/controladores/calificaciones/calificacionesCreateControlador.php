<?php

include('../../config.php');

$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_materia  = $_GET['id_materia'];
ECHO $nota1 = $_GET['nota1'];
$nota2  = $_GET['nota2'];
$nota3  = $_GET['nota3'];
$nota_final = $_GET['nota_final'];

///////////nota n1
$sql = "SELECT * FROM calificaciones WHERE docente_id = '$id_docente' AND estudiante_id = '$id_estudiante' AND materia_id = '$id_materia' ";
$query = $pdo->prepare($sql);
$query->execute();
$notas = $query->fetch(PDO::FETCH_ASSOC);//si esa consulta existe se puede crear la nota

if ($notas) {
    $id_calificacion = $notas['id_calificacion'];

    $sentencia = $pdo->prepare('UPDATE calificaciones SET nota1 =:nota1, nota2 =:nota2,nota3 =:nota3,notaFinal =:notaFinal, fyh_actualizacion=:fyh_actualizacion WHERE id_calificacion=:id_calificacion');
    $sentencia->bindParam(':nota1', $nota1);
    $sentencia->bindParam(':nota2', $nota2);
    $sentencia->bindParam(':nota3', $nota3);
    $sentencia->bindParam(':notaFinal', $nota_final);
    $sentencia->bindParam(':fyh_actualizacion', $fechayhora);
    $sentencia->bindParam(':id_calificacion', $id_calificacion);
    $sentencia->execute();

} else {
    $sentencia = $pdo->prepare('INSERT INTO calificaciones
    (docente_id,estudiante_id,materia_id,nota1, nota2,nota3,notaFinal,  fyh_creacion, estado)
    VALUES ( :docente_id,:estudiante_id,:materia_id,:nota1,:nota2,:nota3,:notaFinal ,:fyh_creacion,:estado)');
    $sentencia->bindParam(':docente_id', $id_docente);
    $sentencia->bindParam(':estudiante_id', $id_estudiante);
    $sentencia->bindParam(':materia_id', $id_materia);
    $sentencia->bindParam(':nota1', $nota1);
    $sentencia->bindParam(':nota2', $nota2);
    $sentencia->bindParam(':nota3', $nota3);
    $sentencia->bindParam(':notaFinal', $nota_final);
    $sentencia->bindParam('fyh_creacion', $fechayhora);
    $sentencia->bindParam('estado', $estadoRegistro);
    $sentencia->execute();
    
    
}
    // agregamos las otras notas a la tabla notas
