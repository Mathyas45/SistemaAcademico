<?php

function eliminar($id_estudiante)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM estudiantes WHERE id_estudiante = :id_estudiante ";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
    $statement->execute();
}
