<?php
include('../../config.php');

$estudiante_id = $_POST['estudiante_id'];
$mes_pagado = $_POST['mes_pagado'];
$monto_pagado = $_POST['monto_pagado'];
$fecha_pago = $_POST['fecha_pago'];

$sentencia = $pdo->prepare('INSERT INTO pagos
(estudiante_id,mes_pagado,monto_pagado,fecha_pago,fyh_creacion, estado)
VALUES ( :estudiante_id,:mes_pagado,:monto_pagado,:fecha_pago,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id', $estudiante_id);
$sentencia->bindParam(':mes_pagado', $mes_pagado);
$sentencia->bindParam(':monto_pagado', $monto_pagado);
$sentencia->bindParam(':fecha_pago', $fecha_pago);
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "El Pago se ha registrado correctamente";
    $_SESSION['icono'] = "success";
?>
    <script>
        window.history.back();
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "El Pago NO se registró correctamente";
    $_SESSION['icono'] = "error";
?>
    <script>
        window.history.back();
    </script>
<?php
}
