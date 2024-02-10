<?php
include('../../app/config.php');
include('../../app/controladores/pagos/pagosDeleteControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_pago'])) {
    $id_pago = $_GET['id_pago'];
    eliminar($id_pago);
}

// Redirecciona a la página principal después de eliminar el usuario

?>
    <script>
        window.history.back();
    </script>
<?php
exit();
