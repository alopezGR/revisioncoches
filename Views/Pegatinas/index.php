<div class="row justify-content-center">
    <?php
    if (isset($_SESSION['vehiculoIncorrecto']) && $_SESSION['vehiculoIncorrecto'] == "true")
        echo " <div class='col-12 alert alert-warning' role='alert'>
                    El vehículo introducido no se encuentra registrado. Prueba de nuevo.
                 </div>";
    unset($_SESSION['vehiculoIncorrecto']);
    ?>
    <div class="col-md-5 col-8 formulario">
        <form action='index.php?controller=pegatinas&action=formulario' method='post'>
            <h2>Indica el vehículo</h2>
            <div class="form-group">
                <label for="vehiculo">Número de vehículo</label>
                <input type="text" class="form-control" name="vehiculo" id="vehiculo">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select id="EMPRESA" name="EMPRESA" class="form-control">
                    <option value="21">Autoperiferia</option>
                    <option value="8">Martin</option>
                    <option value="10">Ruiz</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>