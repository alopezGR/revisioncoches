<form method="post" action="index.php?controller=exportar&action=exportarRevisiones">
    <div class="row d-flex justify-content-center bordes">
        <div class="col-12">
            <h5>EXPORTAR REVISIONES</h5>
        </div>
        <div class="col-8 mt-5" style=" height: auto">
            <div class="form-group">
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" id="numero" name="numero" readonly value="<?php echo $vehiculo; ?>">
            </div>
            <div class="form-group">
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" id="numero" name="numero" readonly value="<?php echo $vehiculo; ?>">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa</label>
                <input type="text" class="form-control" id="empresa" readonly value="<?php echo $empresas[$resultado['IDEMPRESA']] ?>">
                <input type="hidden" class="form-control" id="empresa" name="empresa" readonly value="<?php echo $resultado['IDEMPRESA'] ?>">
            </div>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-12 d-flex justify-content-center">
            <div class="custom-control custom-checkbox">
                <button type="submit" class="btn btn-success">Exportar</button>
            </div>
        </div>
    </div>
</form>
<script src="js/script.js"></script>