<?php
include('../../app/config.php');
include('../../app/controladores/materias/materiasDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_materia'])) {
    $id_materia = $_GET['id_materia'];
    eliminar($id_materia); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();