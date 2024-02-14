<?php
include('../../config.php');

$id_docente = $_POST['id_docente'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_curso = $_POST['id_curso'];

$sentencia = $pdo->prepare('INSERT INTO asignaciones
( docente_id ,nivel_id,grado_id,materia_id,fyh_creacion, estado)
VALUES ( :docente_id, :nivel_id, :grado_id, :materia_id, :fyh_creacion, :estado)');

$sentencia->bindParam(':docente_id', $id_docente);
$sentencia->bindParam(':nivel_id', $id_nivel);
$sentencia->bindParam(':grado_id', $id_grado);
$sentencia->bindParam(':materia_id', $id_curso);
$sentencia->bindParam(':fyh_creacion', $fechayhora);
$sentencia->bindParam(':estado', $estadoRegistro);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se asigno la materia al docente correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . '/admin/docentes/asignacion.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "NO se asigno la materia al docente correctamente";
    $_SESSION['icono'] = "error";
?>
    <script>
        window.history.back();
    </script>
<?php
}
