<div class="row justify-content-center">
    <?php
    if (isset($_SESSION['vehiculoIncorrecto']) && $_SESSION['vehiculoIncorrecto'] == "true")
        echo " <div class='col-12 alert alert-warning' role='alert'>
                    El vehículo introducido no se encuentra registrado. Prueba de nuevo.
                 </div>";
    unset($_SESSION['vehiculoIncorrecto']);
    ?>
    <div class="col-md-5 col-8 formulario">
        <form action='index.php?controller=documentacion&action=formulario' method='post'>
            <h2>Indica el vehículo</h2>
            <div class="form-group">
                <label for="vehiculo">Número de vehículo</label>
                <input type="text" class="form-control" name="vehiculo" id="vehiculo">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <select required id="EMPRESA" name="EMPRESA" class="form-control">
                    <option value=""></option>
                    <option value="21">Autoperiferia</option>
                    <option value="8">Martin</option>
                    <option value="10">Ruiz</option>
                    <option value="5">Unauto</option>
                    <option value="14">Murcia</option>
                    <option value="22">Mallorca</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>