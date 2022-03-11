<script>
    <?php
    if (isset($_SESSION['nombre_fichero_descarga'])) {
    ?>
        window.open("descargar.php", "Diseño Web")
    <?php
    }
    ?>
</script>
<div class="row justify-content-center">
    <div class="col-8">
        <h1 class="text-center">Opciones</h1>
    </div>
    <div class="col-lg-6 col-sm-12 mt-5">
        <a class="btn botonera" href="index.php?controller=accesibilidad&action=index">Estado Accesibilidad</a>
    </div>
    <div class="col-lg-6 col-sm-12 mt-5">
        <a class="btn botonera" href="index.php?controller=pegatinas&action=index">Estado Pegatinas</a>
    </div>
    <div class="col-lg-6 col-sm-12 mt-5">
        <a class="btn botonera" href="index.php?controller=seguridad&action=index">Estado Elementos de Seguridad</a>
    </div>
    <div class="col-lg-6 col-sm-12 mt-5">
        <a class="btn botonera" href="index.php?controller=documentacion&action=index">Estado Documentación</a>
    </div>
    <div class="col-lg-6 col-sm-12 mt-5">
        <a class="btn botonera" href="index.php?controller=limpieza&action=index">Estado Limpieza y Conservación</a>
    </div>
    <?php if (isset($_SESSION['admin'])) { ?>
        <div class="col-lg-6 col-sm-12 mt-5">
            <a class="btn botonera" href="index.php?controller=exportar&action=index">Exportar datos a Excel</a>
        </div>
    <?php } ?>
</div>