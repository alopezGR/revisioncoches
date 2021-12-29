
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
    <div class="col-md-5 col-8 formulario">
        <form action='index.php?controller=informe&action=formulario' method='post'>
            <h2>Indica el vehículo</h2>
            <div class="form-group">
                <label for="vehiculo">Número de vehículo</label>
                <input type="text" class="form-control" name="vehiculo" id="vehiculo">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>