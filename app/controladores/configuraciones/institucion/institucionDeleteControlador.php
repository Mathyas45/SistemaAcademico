<?php

function eliminarRol($id_config_institucion)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM configuracion_instituciones WHERE id_config_institucion = :id_config_institucion";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_config_institucion', $id_config_institucion, PDO::PARAM_INT);
    $statement->execute();
}
