<?php
include('../../app/config.php');
include('../../app/controladores/usuarios/usuariosDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
    eliminarUsuario($id_usuario); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();
?>