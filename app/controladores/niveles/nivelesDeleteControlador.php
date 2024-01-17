<?php

function eliminarRol($id_nivel)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM niveles WHERE id_nivel = :id_nivel";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_nivel', $id_nivel, PDO::PARAM_INT);
    $statement->execute();
}
