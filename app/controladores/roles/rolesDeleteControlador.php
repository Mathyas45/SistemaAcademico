<?php

function eliminarRol($id_rol) {
   
    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM roles WHERE id_rol = :id_rol";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
    $statement->execute();
}
?>
