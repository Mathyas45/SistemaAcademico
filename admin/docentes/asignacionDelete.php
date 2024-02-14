<?php
include('../../app/config.php');
include('../../app/controladores/docentes/docentesAsignacionDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_asignacion'])) {
    $id_asignacion = $_GET['id_asignacion'];
    eliminar($id_asignacion); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header('Location:' . APP_URL . '/admin/docentes/asignacion.php');
exit();