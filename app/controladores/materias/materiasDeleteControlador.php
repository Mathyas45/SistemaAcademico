<?php

function eliminar($id_materia)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM materias WHERE id_materia = :id_materia";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
    $statement->execute();
}
