<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <button class="float-right d-none d-sm-inline-block" id="modoNocturnoToggle" onclick="toggleModoNocturno()">Modo
        Nocturno</button>

    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= $anioActual ?> <a href="https://www.facebook.com/profile.php?id=100077584231290">Coax Inc</a>.</strong> Todos los derechos reservados.
</footer>
</div>
<!-- ./wrapper -->
<style>
    /* Estilos para el modo diurno */
    /* Puedes definir tus estilos normales aquí */

    /* Estilos para el modo nocturno */
    .dark-mode {
        background-color: #333;
        color: #fff;
    }

    /* Agrega estilos personalizados para elementos específicos en el modo nocturno */
    .dark-mode .navbar {
        background-color: #222;
    }

    .dark-mode .nav-link {
        color: #fff;
    }
</style>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= APP_URL; ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= APP_URL; ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= APP_URL; ?>/public/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= APP_URL; ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/jszip/jszip.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= APP_URL; ?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
<script>
    function toggleModoNocturno() {
        // Agregar o quitar la clase 'dark-mode' del <body> según el estado actual
        document.body.classList.toggle('dark-mode');
    }
</script>

</html>