<?php

function eliminar($id_pago)
{

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM pagos WHERE id_pago = :id_pago";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_pago', $id_pago, PDO::PARAM_INT);
    $statement->execute();
}
