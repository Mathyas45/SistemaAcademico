<?php
include('../../app/config.php');
include('../../app/controladores/niveles/nivelesDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_nivel'])) {
    $id_nivel = $_GET['id_nivel'];
    eliminarRol($id_nivel); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();