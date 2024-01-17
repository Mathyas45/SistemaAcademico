<?php
include('../../../app/config.php');
include('../../../app/controladores/configuraciones/institucion/institucionDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_config_institucion'])) {
    $id_config_institucion = $_GET['id_config_institucion'];
    eliminarRol($id_config_institucion); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();
