<?php

function eliminar($id_grado)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM grados WHERE id_grado = :id_grado";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_grado', $id_grado, PDO::PARAM_INT);
    $statement->execute();
}
