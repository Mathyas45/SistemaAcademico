<?php
include('../../app/config.php');
include('../../app/controladores/estudiantes/estudiantesDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_estudiante'])) {
    $id_estudiante = $_GET['id_estudiante'];
    eliminar($id_estudiante); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();