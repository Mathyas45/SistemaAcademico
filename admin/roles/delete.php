<?php
include('../../app/config.php');
include('../../app/controladores/roles/rolesDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_rol'])) {
    $id_rol = $_GET['id_rol'];
    eliminarRol($id_rol); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();
?>