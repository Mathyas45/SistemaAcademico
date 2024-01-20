<?php
include('../../app/config.php');
include('../../app/controladores/grados/gradosDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_grado'])) {
    $id_grado = $_GET['id_grado'];
    eliminar($id_grado); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();