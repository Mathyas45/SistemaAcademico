<?php

function eliminar($id_docente)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM docentes WHERE id_docente = :id_docente ";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_docente', $id_docente, PDO::PARAM_INT);
    $statement->execute();
}
