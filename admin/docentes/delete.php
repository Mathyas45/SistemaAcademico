<?php
include('../../app/config.php');
include('../../app/controladores/docentes/docentesDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_docente'])) {
    $id_docente = $_GET['id_docente'];
    eliminar($id_docente); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();