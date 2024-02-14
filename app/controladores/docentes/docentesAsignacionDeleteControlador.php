<?php

function eliminar($id_asignacion)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM asignaciones WHERE id_asignacion = :id_asignacion ";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_asignacion', $id_asignacion, PDO::PARAM_INT);
    $statement->execute();
}
