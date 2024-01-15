<?php

function eliminarUsuario($id_usuario)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM usuarios WHERE id_usuario = :id_usuario ";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $statement->execute();

}
