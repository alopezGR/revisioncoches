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
<?php
    if (isset($_SESSION['error']) && $_SESSION['error'])
        echo " <div class='col-12 alert alert-danger' role='alert'>
                    Se ha producido un error. Inténtelo de nuevo más tarde.
                 </div>";
    unset($_SESSION['error']);
    ?>
    <?php
    if (isset($_SESSION['exito']) && $_SESSION['exito'] == "true")
        echo " <div class='col-12 alert alert-success' role='alert'>
                    La revisión del vehículo se ha guardado con éxito.
                 </div>";
    unset($_SESSION['exito']);
    ?>
    <?php
    if (isset($_SESSION['vehiculoIncorrecto']) && $_SESSION['vehiculoIncorrecto'] == "true")
        echo " <div class='col-12 alert alert-warning' role='alert'>
                    El vehículo introducido no se encuentra registrado. Prueba de nuevo.
                 </div>";
    unset($_SESSION['vehiculoIncorrecto']);
    ?>
    <?php
    if (isset($_SESSION['passwordCambiada']) && $_SESSION['passwordCambiada'] == "true")
        echo " <div class='col-12 alert alert-success' role='alert'>
                    La contraseña se ha actualizado correctamente.
                 </div>";
    unset($_SESSION['passwordCambiada']);
    ?>
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